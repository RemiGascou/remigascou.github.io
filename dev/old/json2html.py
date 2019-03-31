

import json
import sys

class Pagemaker(object):
    """docstring for Pagemaker."""
    def __init__(self):
        super(Pagemaker, self).__init__()
        self.metadata   = {}
        self.data       = {}
        self.htmldata   = []

    def load(self, filename):
        f = open(filename, "r")
        data = f.readlines()
        f.close()
        d = json.loads(''.join(data))
        self.metadata   = d["metadata"]
        self.data       = d["data"]

    def _genhtmldata(self):
        for line in self.data:
            if line.startswith("**") and line.startswith("**"):
                self.htmldata.append("<strong>" + line[2:-2] + "</strong>")
            elif line.startswith("*") and line.startswith("*"):
                self.htmldata.append("<italic>" + line[1:-1] + "</italic>")
            elif line.startswith("__") and line.startswith("__"):
                self.htmldata.append("<strong>" + line[2:-2] + "</strong>")
            elif line.startswith("_") and line.startswith("_"):
                self.htmldata.append("<italic>" + line[1:-1] + "</italic>")
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
        for line in self.htmldata:
            f.write(line+"\n")
            f.write("<br>\n")
        f.close()




if __name__ == '__main__':
    if len(sys.argv) != 2:
        print("Usage python3 md2json.py page_data.json")
    else:
        pagefile = sys.argv[1]
        p = Pagemaker()
        p.load(pagefile)
        p.exportHTML()
