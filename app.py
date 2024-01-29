import requests
import json
import time
import os

def otobir():
    url = "URL_HERE"
    payload = json.dumps({
    "deger": 1
    })
    headers = {
    'Content-Type': 'application/json'
    }
    response = requests.request("POST", url, headers=headers, data=payload)
    print(response.text)

def json_kontrol():
    url = 'URL_HERE'  

    try:
        
        response = requests.get(url)
        json_data = response.json()
        deger = json_data.get('deger')
        return deger

    except Exception as e:
        print(f'Hata: {e}')

while True:
    sonuc=json_kontrol()

    if sonuc==0:
        otobir()
        os.system("shutdown /s /t 1")
        break

    else:
        time.sleep(5)  


