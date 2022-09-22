# Dev Dependencies can be installed using `python -m pip install splinter[selenium4]`
# Read the Docs: https://splinter.readthedocs.io/en/latest/drivers/chrome.html

import os, time, re, copy, math, json

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
# options.add_argument("--window-size=1000,1000")
# options.add_argument("--start-maximized")
# options.add_argument("--headless")
b = Browser('chrome', options = options)
# browser = Browser('chrome', options = options)
# b = Browser('chrome', options = options, headless=True)

# b.visit('https://members.athome.jp/login')
print(b.title)

sample_request = {
  # "site_enabled" : {
  #   0 : "reins"
  # },
  "object_type" : [
    "マンション",
    "アパート",
    "戸建",
  ],
  "prefectures" : [
    "埼玉県",
    "福井県",
    "三重県"
  ],
  "cities" : {
    "埼玉県" : [
      "さいたま市西区",
      "さいたま市北区",
      "さいたま市大宮区",
      "さいたま市浦和区"
    ],
    "福井県" : [
      "敦賀市",
    ],
    "三重県" : [
      "津市",
    ],
  },
  # "madori" : {
  #   0 : "1K/SK",
  #   1 : "1DK/LK/SDK/SLK",
  #   2 : "1LDK/SLDK"
  # },
  "madori" : [
    "1K",
    "1DK",
    "1LDK",
    "2K",
    "3K"
  ],
  "route_prefectures" : [
    "埼玉県",
  ],
  "routes" : [
    "JR京浜東北線",
    "つくばエクスプレス線",
    "埼玉新都市交通伊奈線",
    "東武伊勢崎線",
    "JR上野東京ライン"
  ],
  "floor_option" : "no_floor",
  "from_station" : 20,
  # "name" : 'LIBR GRANT 大宮',
  "property_name" : None,
  "area_min" : 10,
  "area_max" : 50,
  "fee_min" : 7,
  "fee_max" : 15,
  "year_build_min" : 1,
  "year_build_max" : 12,
  "feed_included" : True,
  "publishing_date" : '2022/08/12',
  "bldg_structure" : [
    "鉄骨造",
    "ＲＣ",
    "ＳＲＣ",
    "ＰＣ"
  ],
  "trade_style" : [
    "0",
    "1",
    "2"
  ],
  "floor_option" : "no_floor",
  "step_min" : 88,
  "step_max" : 99
}

helper = Mitsui()

# b.select('current_per_page', '10')
# last_index = 0
# properties = b.find_by_css('.list-box')

# if(len(properties[last_index:last_index+10]) == 0):
#   next_button = b.find_by_css('.page-item a[rel=next]')
#   if(len(next_button) > 0):
#     # NEXT
#     next_button.first.click()
#     last_index = 0
#   elif(len(next_button) == 0):
#     # END
#     last_index = -1
#     # break

# for p_id, property in enumerate(properties[last_index:last_index+10]):
#   print(p_id)

# last_index += 10