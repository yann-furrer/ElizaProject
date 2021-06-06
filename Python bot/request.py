import requests
import json
import random

def api_cocktail(ingredient):
    r = requests.get("http://139.162.168.38/api/get_harddrink/"+ingredient)
    result = json.loads(r.text)
    nb_result = len(result)
    rand = random.randint(0, nb_result-1)
    name = result[rand]['name']
    url = result[rand]['url']
    print("name = "+name)
    return name , url


def api_soft(ingredient):
    r = requests.get("http://139.162.168.38/api/get_softdrink/"+ingredient)
    result = json.loads(r.text)
    nb_result = len(result)
    rand = random.randint(0, nb_result-1)
   
    return result[rand]['name'] , result[rand]['url']


def api_food(ingredient):
    r = requests.get("http://139.162.168.38/api/get_noveganfood/"+ingredient)
    result = json.loads(r.text)
    nb_result = len(result)
    rand = random.randint(0, nb_result-1)
   
    return result[rand]['name'] , result[rand]['url']


def api_vege(ingredient):
    r = requests.get("http://139.162.168.38/api/get_veganfood/"+ingredient)
    result = json.loads(r.text)
    nb_result = len(result)
    rand = random.randint(0, nb_result-1)
   
    return result[rand]['name'] , result[rand]['url']