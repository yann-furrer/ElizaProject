from os import replace
import tweepy
from tweepy.models import SearchResults
import request
from function import api, search, tweet
import schedule
import time






#while_count = 0
#nb_tweet = 0
search_result ="vide"


# def tweet(name, url, in_reply_to_status_id):
#     auto_populate_reply_matadata = True
#     status = name+"    "+url
#     api.update_status(status, in_reply_to_status_id, auto_populate_reply_matadata)
#     return "message envoye"




def execute(search, nb_tweet):
    while_count = 0
    
    while while_count < nb_tweet:
        
        if "cocktail" in  search[while_count].text:
            modify = search[while_count].text.replace("@ChefBot7 cocktail", "")
            modify = modify[1:].replace(" ", "%")
            name , url = request.api_cocktail(modify)
            
            tweet(search, name, url, while_count)
            
        if "soft" in  search:
            modify = search.replace("@ChefBot7 soft", "")
            modify = modify[1:].replace(" ", "%")
            
        if "food" in  search:
            modify = search.replace("@ChefBot7 food", "")
            modify = modify[1:].replace(" ", "%")
            
        if "vege" in  search:
            modify = search.replace("@ChefBot7 vege", "")
            modify = modify[1:].replace(" ", "%")
            
        else:
            print("else",search[while_count].text)
        print(while_count)
        while_count += 1






def count():
    print("execute")
    search_result, nb_tweet = search()
    execute(search_result, nb_tweet)
schedule.every(10).seconds.do(count)

while 1:
    schedule.run_pending()
    schedule.every(10).seconds.do(count)
    time.sleep(1)