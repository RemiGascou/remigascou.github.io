import sys

class Page(object):
    """docstring for Page."""
    def __init__(self, includedir):
        super(Page, self).__init__()
        self.includedir = includedir
        header = self.readfile(self.includedir+"header.html")
        navbar = self.readfile(self.includedir+"navbar.html")
        footer = self.readfile(self.includedir+"footer.html")

        writefile("page_in.html", mkpage_in(page_title, header, navbar))
        writefile("page_out.html", mkpage_out(footer))

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

    def mkpage_in(title, header, navbar):
        page_in = """<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
        """
        page_in += ''.join(header)
        page_in += "<title>" + title + "</title>"
        page_in += """
<link href="/styles/search-box.css" rel="stylesheet">
</head>
<body>"""
        page_in += ''.join(navbar)
        page_in += """
<!-- ******************************** begin content ******************************** -->
<div class="container">
        """
        return page_in.replace("\t","").split("\n")

    def mkpage_out(footer):
        page_out = """</div>
<!-- ******************************** end content ********************************** -->
        """
        page_out += ''.join(footer)
        page_out += """
<!-- ******************************** begin scripts ******************************** -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- ******************************** end scripts ********************************** -->
</body>
</html>"""
        return page_out.replace("\t","").split("\n")



if __name__ == '__main__':
    if len(sys.argv) != 3:
        print("Usage python3 mkpages.py page_title includes/")
    else:
        page_title = sys.argv[1]
        includedir = sys.argv[2]
