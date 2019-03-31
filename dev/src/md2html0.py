

import json
import sys


page_in = """<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ******************************** begin header ******************************** -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="icon" type="image/png" href="/meta/favicon.png">
    <title>Title</title>
    <style media="screen">body {margin-top: 70px;}</style>
    <!-- ******************************** end header ********************************** -->
    <link href="/styles/search-box.css" rel="stylesheet">
</head>
<body>
    <!-- ******************************** begin navbar ************************************** -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <a class="navbar-brand" href="/">Remi Gascou</a>
            <ul class="navbar-nav">

			</ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="/cv.html">CV</a></li>
            </ul>
        </div>
    </nav>
    <!-- ******************************** end navbar **************************************** -->


    <!-- ******************************** begin content ******************************** -->
    <div class="container">
"""
page_out = """    </div>
    <!-- ******************************** end content ********************************** -->



    <!-- ******************************** begin footer ******************************** -->
    <footer class="search-page">
        <p class="text-center">
        	&copy; Remi GASCOU 2017-2019<br/>
        </p>
    </footer>
    <!-- ******************************** end footer ********************************** -->



    <!-- ******************************** begin scripts ******************************** -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- ******************************** end scripts ********************************** -->
</body>
</html>"""

import json
import sys

class Pagemaker(object):
    """docstring for Pagemaker."""
    def __init__(self):
        super(Pagemaker, self).__init__()
        self.metadata   = {"title":"","date":""}
        self.data       = {}
        self.htmldata   = []

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
        f.write(page_in)
        for line in self.htmldata:
            f.write(line+"\n")
            #f.write("<br>\n")
        f.write(page_in)
        f.close()

    def loadMD(self, filename):
        def input_metadata():
            maxlen = max([len(key) for key in self.metadata.keys()])
            for key in self.metadata.keys():
                print(key.rjust(maxlen),": ", end="")
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
    if len(sys.argv) != 3:
        print("Usage python3 md2html.py page.md outfile.html")
    else:
        pagefile = sys.argv[1]
        outfile  = sys.argv[2]
        p = Pagemaker()
        p.loadMD(pagefile)
        p.exportHTML(outfile)
