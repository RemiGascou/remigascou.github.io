
import json
import sys


class Parts(object):
    """docstring for Parts."""
    def __init__(self, page_title, includedir):
        super(Parts, self).__init__()
        self.includedir = includedir
        self.page_title = page_title
        self.header = self.readfile(self.includedir+"header.html")
        self.navbar = self.readfile(self.includedir+"navbar.html")
        self.footer = self.readfile(self.includedir+"footer.html")
        self.parts = {
            "page_in"  : self.mkpage_in(),
            "page_out" : self.mkpage_out()
        }

    def set_title(self, title):
        self.page_title = title
        self.parts["page_in"] = self.mkpage_in()

    def readfile(self, file):
        f = open(file, "r")
        data = ''.join(f.readlines())
        f.close()
        return data

    def writefile(self, file, content):
        f = open(file, "w")
        if type(content) == list:
            for line in content:
                if not line.endswith("\n"):
                    line += "\n"
                f.write(line)
        elif type(content) == str:
            f.write(line)
        f.close()

    def mkpage_in(self):
        page_in = """<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
        """
        page_in += ''.join(self.header)
        page_in += "<title>" + self.page_title + "</title>"
        page_in += """
<link href="/styles/search-box.css" rel="stylesheet">
</head>
<body>"""
        page_in += ''.join(self.navbar)
        page_in += """
<!-- ******************************** begin content ******************************** -->
<div class="container">
        """
        return page_in.replace("\t","").split("\n")

    def mkpage_out(self):
        page_out = """</div>
<!-- ******************************** end content ********************************** -->
        """
        page_out += ''.join(self.footer)
        page_out += """
<!-- ******************************** begin scripts ******************************** -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- ******************************** end scripts ********************************** -->
</body>
</html>"""
        return page_out.replace("\t","").split("\n")



class Pagemaker(object):
    """docstring for Pagemaker."""
    def __init__(self, includedir, page_title=""):
        super(Pagemaker, self).__init__()
        self.metadata   = {"title":"","date":""}
        self.data       = {}
        self.htmldata   = []
        self.parts      = Parts(page_title, includedir)

    def loadJSON(self, filename):
        f = open(filename, "r")
        data = f.readlines()
        f.close()
        d = json.loads(''.join(data))
        self.metadata   = d["metadata"]
        self.data       = d["data"]

    def _genhtmldata(self):
        for line in self.data:
            if line.startswith("**") and line.startswith("**"):
                self.htmldata.append("<strong>" + line[2:-2] + "</strong>\n<br>")
            elif line.startswith("*") and line.startswith("*"):
                self.htmldata.append("<i>" + line[1:-1] + "</i>\n<br>")
            elif line.startswith("__") and line.startswith("__"):
                self.htmldata.append("<strong>" + line[2:-2] + "</strong>\n<br>")
            elif line.startswith("_") and line.startswith("_"):
                self.htmldata.append("<i>" + line[1:-1] + "</i>\n<br>")
            elif line.startswith("###### "):
                self.htmldata.append("<h6>" + line[6+1:] + "</h6>")
            elif line.startswith("##### "):
                self.htmldata.append("<h5>" + line[5+1:] + "</h5>")
            elif line.startswith("#### "):
                self.htmldata.append("<h4>" + line[4+1:] + "</h4>")
            elif line.startswith("### "):
                self.htmldata.append("<h3>" + line[3+1:] + "</h3>")
            elif line.startswith("## "):
                self.htmldata.append("<h2>" + line[2+1:] + "</h2>")
            elif line.startswith("# "):
                self.htmldata.append("<h1>" + line[1+1:] + "</h1>")
            else:
                self.htmldata.append(line)

    def exportHTML(self, fileout=""):
        if len(fileout) == 0 and len(self.metadata["title"]) != 0:
            fileout = self.metadata["title"].lower().replace(" ","_")+".html"
        self._genhtmldata()
        f = open(fileout, "w")
        for line in self.parts.parts["page_in"]:
            f.write(line+"\n")
        for line in self.htmldata:
            f.write(line+"\n")
        for line in self.parts.parts["page_out"]:
            f.write(line+"\n")
        f.close()

    def loadMD(self, filename):
        def input_metadata():
            maxlen = max([len(key) for key in self.metadata.keys()])
            for key in self.metadata.keys():
                print(key.ljust(maxlen),": ", end="")
                self.metadata[key] = input()
        f = open(filename, "r")
        data = f.readlines()
        f.close()
        self.data = [line.replace("\n","") for line in data]
        input_metadata()

    def saveJSON(self, filename):
        f = open(filename, "w")
        final_d = {"metadata" : self.metadata, "data" : self.data}
        f.write(json.dumps(final_d, indent=4))
        f.close()



if __name__ == '__main__':
    if len(sys.argv) != 4:
        print("Usage python3 md2html.py page.md includes/ outdir/")
    else:
        pagefile   = sys.argv[1]
        includedir = sys.argv[2]
        outdir     = sys.argv[3]
        outfile    = "out.html"
        p = Pagemaker(includedir)
        p.loadMD(pagefile)
        p.exportHTML(outdir+outfile)
