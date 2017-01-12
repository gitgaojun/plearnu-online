#!/usr/bin/python

# 捕获html数据

import urllib.request

import re

def getHtmlByUrl(url):
    page = urllib.request.urlopen(url);
    html = page.read();
    return html;

def saveImg(html):
    matchString = e.'img';
    patter = re.compile(matchString);
    imgList = patter.match(html);
    for imgUrl in imgList:
        urllib.request.urlretrieve(imgUrl);


html = getHtmlByUrl('https://www.douban.com/search?q=%E6%AD%A3%E9%98%B3%E9%97%A8%E4%B8%8B');

print(saveImg(html));


# 先 利用 url 获取页面内容，
# 再利用正则，匹配出需要的数据，利用 urllib urlopen urlretrieve  打开 获取资源下载到本地
# re 正则对象 
