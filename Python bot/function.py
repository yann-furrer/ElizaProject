import tweepy

consumer_key = 'consumer_key'
consumer_secret = 'consumer_secret'


key = 'key'
secret = 'secret'

auth = tweepy.OAuthHandler(consumer_key, consumer_secret)
auth.set_access_token(key, secret)

api = tweepy.API(auth)


def search():
    search = api.search("@ChefBot7")
    nb_tweet = len(search)
    return search , nb_tweet


def tweet(search, name, url, while_count):
    arobase = search[while_count].user.screen_name
    status = "@"+arobase+"   "+name+"    "+url
    print(arobase)
    in_reply_to_status_id = search[while_count].in_reply_to_user_id
    api.update_status(status, in_reply_to_status_id)
    print("meesage envoye")





