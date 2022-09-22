from splinter import Browser
from selenium import webdriver

import re

class Table02c:

    def switch(self, index, element):
        default = getattr(self, '_default')
        return getattr(self, 'case_' + str(index), lambda: default)(element)
      
    def _default(self, element):
      return '-'

    # Helper
    def clearText(self, html):
      return " ".join(html.replace('&nbsp;', '').split())

    # A Tag Shogo Helper
    def aTagShogo(self, el):
      return self.clearText(el.find_by_tag('a').html)

    def case_1(self, element):
        return self.clearText(element.html)

    def case_2(self, element):
        return element.find_by_tag('img')['src']        

    def case_3(self, element):
        return self.clearText(re.sub(r'.*">', '', element.html))

    def case_4(self, element):
        return self.clearText(element.html)

    def case_5(self, element):
        return self.clearText(element.html)

    def case_6(self, element):
        return self.clearText(element.html)

    def case_7(self, element):
        return self.aTagShogo(element)

    def case_8(self, element):
        return self.clearText(element.html)

    def case_9(self, element):
        return self.clearText(element.html)

    def case_10(self, element):
        return self.clearText(element.html)

    def case_11(self, element):
        return self.aTagShogo(element)

    def case_12(self, element):
        return self.clearText(element.html)

    def case_13(self, element):
        return self.clearText(element.html)

    def case_14(self, element):
        return self.clearText(element.html)

    def case_15(self, element):
        return element.find_by_tag('img')['src']

    def case_16(self, element):
        return self.aTagShogo(element)