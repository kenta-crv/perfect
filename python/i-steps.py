# Dev Dependencies can be installed using `python -m pip install splinter[selenium4]`
# Read the Docs: https://splinter.readthedocs.io/en/latest/drivers/chrome.html
import json
import os, time, re

from splinter import Browser
from selenium import webdriver

f_path = os.path.abspath('./drivers/win')

from tokyu.Tokyu import *
from mitsui.Mitsui import *
from sumitomo.Sumitomo import *
from reins.Reins import *
from atbb import main as atbb
from itandibb.Itandibb import *

from atbb.Atbb import *

# os.environ['PATH'] += r";C:/Users/HiPE/Desktop/python/python_selenium/drivers"
os.chmod(f_path, 755)
os.environ['PATH'] += f'{os.pathsep}{f_path}'

options = webdriver.ChromeOptions()
options.add_experimental_option("debuggerAddress", "localhost:8989")
b = Browser('chrome', options=options)
# browser = Browser('chrome', options = options)
# b = Browser('chrome', options = options, headless=True)

# b.visit('https://members.athome.jp/login')
print(b.title)

sample_request = {
    # "site_enabled" : {
    #   0 : "reins"
    # },
    "object_type": [
        "マンション",
        "アパート",
        "戸建",
    ],
    "prefectures": [
        "埼玉県"
    ],
    "cities": {
        "埼玉県": [
            "さいたま市西区",
            "さいたま市北区",
            "さいたま市大宮区",
        ]
    },
    # "madori" : {
    #   0 : "1K/SK",
    #   1 : "1DK/LK/SDK/SLK",
    #   2 : "1LDK/SLDK"
    # },
    "madori": [
        "1K",
        "1DK",
        "1LDK",
    ],
    "floor_option": "no_floor"
}

cols = {}
cols2 = {}
cols3 = {}
cols4 = {}
#itanbb

header = [
    '賃料',
    '敷礼保',
    '更新料',
    '現況',
    '駐輪場代',
    '鍵交換費',
    '備考',
    '周辺状況',
    '敷引',
    '更新事務手数料',
    '入居可能日',
    '駐車場代',
    'バイク置き場代',
    '町内会費',
    '火災保険料'
]

for head in header:
    sample = b.find_by_text(head).find_by_xpath('..').find_by_xpath('following-sibling::div').find_by_css('span').html.replace('<span class=\"FrontSpace\">', '').replace('</span>', '').replace('<span class=\"GrayText FrontSpace\">', '').replace('<span class=\"GrayText\">', '').strip()
    html = sample
    cols[head] = html
    # print(sample)
print(json.dumps(cols, indent=4, ensure_ascii=False))

header2 = [
    'バス・トイレ',
    'キッチン',
    # '収納',
    'セキュリティ',
    '通信',
    'ライフライン',
    '建物情報',
    '部屋情報その他',
]


for head2 in header2:
    sample2 = b.find_by_text(head2).find_by_xpath('..').find_by_xpath('following-sibling::div').html.replace('</span>', '').replace('<span class=\"\">', '').replace('<span class=\"FrontSpace\">', '').replace('<span class=\"GrayText\">', '').strip()
    html2 = sample2
    cols2[head2] = html2
    # print(sample)
print(json.dumps(cols2, indent=4, ensure_ascii=False))



header3 = [
    'AD',
    '間取り',
    '専有面積',
    '入居可能日',
    '所在階',
    '階建て',
    '向き',
    '広告掲載可否',
    '物件種別',
    '築年数',
    '構造',
    '総戸数',
    '契約種別',
    '契約期間',
    '解約予告',
    '再契約・更新契約',
    '内見方法',
]

for head3 in header3:
    sample3 = b.find_by_text(head3).find_by_xpath('..').find_by_xpath('following-sibling::div').find_by_css('span').html.replace('</span>', '').replace('<span class=\"\">', '').replace('<span class=\"FrontSpace\">', '').replace('<span class=\"GrayText\">', '').strip()
    html3 = sample3
    cols3[head3] = html3
    # print(sample)
print(json.dumps(cols3, indent=4, ensure_ascii=False))


header4 = [
    '賃料',
    '敷礼保',
    '所在地'
]

for head4 in header4:
    sample4 = b.find_by_text(head4).find_by_xpath('..').find_by_xpath('following-sibling::div').find_by_css('span').html.replace('</span>', '').replace('<span class=\"\">', '').replace('<span class=\"FrontSpace\">', '').replace('<span class=\"GrayText\">', '').replace('<span class=\"GrayText FrontSpace\">', '').strip()
    html4 = sample4
    cols4[head4] = html4
    # print(sample)
print(json.dumps(cols4, indent=4, ensure_ascii=False))