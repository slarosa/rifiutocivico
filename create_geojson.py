import json

file = '/Users/slarosa/Downloads/Leaflet.Photo-gh-pages/examples/data.json'
json_object = json.load(file)

with open(file) as data_file:
    data = json.load(data_file)

f = open("/Users/slarosa/Downloads/Leaflet.Photo-gh-pages/examples/data.geojson", 'a')

header = '''{ "type": "FeatureCollection",
  "features": ['''
f.write(header)

for i in range(0, len(data)):
    feature = '''{
          "type": "Feature",
          "geometry": {
            "type": "Point",
            "coordinates": [{}, {}]
            },
          "properties": {
            "caption": "X.X.X.X",
            "url_z": "1000",
            "url_t": "1000"
            }
        }'''.format(data[i]['longitude'], data[i]['latitude'])
    f.write(feature)

footer = '''{
    ...
    }
  ]
}'''
f.write(footer)

f.close()
