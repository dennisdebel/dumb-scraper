# dumb-scraper
PHP webscraper, using caching methods to prevent detection/(ip)blocking/blacklisting

## About
API's suck. Sometimes you just need to scrape some fancy web2.0 data but really don't want to make an developer account, build widgets, include js and deal with other people's terrible design. With this scraper you don't have to! You'll just have to deal with my ugly coding skills!

## Features
The dumb-scraper downloads a copy of the data you want to a cache file and only re-scrapes it when the data is (n)-seconds old. Otherwise it serves you the cached copy. You can define a user-agent, scrape/refresh interval, url to scrape, select elements to scrape. 
See the twitter example for more info.


## Requirements
PHP 5+
[PHP Simple HTML DOM Parser 1.5 (included) ](http://simplehtmldom.sourceforge.net/)
