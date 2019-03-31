

import json
import sys

d_metadata = {
    "title" : "",
    "date"  : ""
}

final_d = {}

def readmd(filename):
    f = open(filename, "r")
    data = f.readlines()
    f.close()
    data = [line.replace("\n","") for line in data]
    return data

def input_metadata():
    for key in d_metadata.keys():
        print(key,":", end="")
        d_metadata[key] = input()

if __name__ == '__main__':
    if len(sys.argv) != 2:
        print("Usage python3 md2json.py page.md")
    else:
        pagefile = sys.argv[1]
        md_data = readmd(pagefile)
        input_metadata()
        final_d = {
            "metadata" : d_metadata,
            "data"     : md_data
        }

        # f = open(pagefile[:-3]+".json", "w")
        # f.write(json.dumps(final_d, indent=4))
        # f.close()
