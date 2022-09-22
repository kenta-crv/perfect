import string, ast, datetime
from tokyu.Tokyu import *
from mitsui.Mitsui import *
from sumitomo.Sumitomo import *
from reins.Reins import *
from itandibb.Itandibb import *
from atbb import main as atbb

from flask import Flask
from flask_restful import Api, Resource, reqparse
from flask_cors import CORS
from waitress import serve

from controllers import *

app = Flask(__name__)
CORS(app)
api = Api(app)

states = {
  'tokyu_browser' : {},
  'tokyu_login' : False,
  'mitsui_browser' : {},
  'mitsui_login' : False,
  'sumitomo_browser' : {},
  'sumitomo_login' : False,
  'reins_browser' : None,
  'reins_login' : False,
  'atbb_browser' : {},
  'atbb_login' : False,
  'itandibb_browser' : {},
  'itandibb_login' : False,
  'terminate_browser' : {}
}

browser_list = [states['tokyu_browser'], states['mitsui_browser'], states['itandibb_browser']]
max_limit = 2.5*60

dynamic_args = reqparse.RequestParser()
dynamic_args.add_argument("prefectures", type=list, help="Prefecture is required", required=False)
dynamic_args.add_argument('prefectures', action='append')
dynamic_args.add_argument("cities", type=str, help="Cities is required", required=False)
dynamic_args.add_argument("object_type", type=list, help="Object Type is required", required=False)
dynamic_args.add_argument('object_type', action='append')
dynamic_args.add_argument("routes", type=list, help="Station Routes is required", required=False)
dynamic_args.add_argument('routes', action='append')
dynamic_args.add_argument("station", type=list, help="Station is required", required=False)
dynamic_args.add_argument('station', action='append')
dynamic_args.add_argument("year_build_min", type=int, required=False)
dynamic_args.add_argument("year_build_max", type=int, required=False)
dynamic_args.add_argument("from_station", type=int, required=False)
dynamic_args.add_argument("area_min", type=int, required=False)
dynamic_args.add_argument("area_max", type=int, required=False)
dynamic_args.add_argument("fee_min", type=str, required=False)
dynamic_args.add_argument("fee_max", type=str, required=False)
dynamic_args.add_argument("first_ten", type=bool, help="first_ten is required", required=False)
dynamic_args.add_argument("madori", type=list, required=False)
dynamic_args.add_argument('madori', action='append')
dynamic_args.add_argument("property_name", type=str, required=False)
dynamic_args.add_argument("publishing_date", type=str, required=False)
dynamic_args.add_argument("browser_id", type=str, required=False)
dynamic_args.add_argument("last_index", type=int, required=False)
dynamic_args.add_argument("ptable", type=str, required=False)
dynamic_args.add_argument("floor_option", type=str, required=False)
dynamic_args.add_argument("trade_style", type=list, help="Trade Style is required", required=False)
dynamic_args.add_argument('trade_style', action='append')
dynamic_args.add_argument("bldg_structure", type=list, help="Building Structure is required", required=False)
dynamic_args.add_argument('bldg_structure', action='append')
dynamic_args.add_argument("other_fees", type=list, help="Other Fees is required", required=False)
dynamic_args.add_argument('other_fees', action='append')
dynamic_args.add_argument("user_name", type=str, required=False)
dynamic_args.add_argument("user_pass", type=str, required=False)
dynamic_args.add_argument("detail_link", type=str, required=False)

reins_property_args = reqparse.RequestParser()
reins_property_args.add_argument("object_type", type=list, help="Object Type is required", required=False)
reins_property_args.add_argument('object_type', action='append')
reins_property_args.add_argument("prefectures", type=list, help="Prefectures is required", required=False)
reins_property_args.add_argument('prefectures', action='append')
reins_property_args.add_argument("cities", type=str, help="Cities is required", required=False)
reins_property_args.add_argument("zumen_flag", type=bool, help="zumen_flag is required", required=False)
reins_property_args.add_argument("image_flag", type=bool, help="image_flag is required", required=False)
reins_property_args.add_argument("first_ten", type=bool, help="first_ten is required", required=False)
reins_property_args.add_argument("madori", type=list, help="Madori is required", required=False)
reins_property_args.add_argument('madori', action='append')
reins_property_args.add_argument("user_name", type=str, required=False)
reins_property_args.add_argument("user_pass", type=str, required=False)

class ReinsSearchProperty(Resource):
  def post(self):
    # Init Helper
    helper = Reins()

    browser = None
    browser = helper.new_browser(debug=False)
    try:
      args = reins_property_args.parse_args()
      args['cities'] = ast.literal_eval(args['cities']) if args['cities'] is not None else None

      if(args['zumen_flag'] == None):
        args['zumen_flag'] = True
      
      if(args['image_flag'] == None):
        args['image_flag'] = True
      
      if(args['object_type'] == None):
        args['object_type'] = ['マンション']

      login_response = helper.login(browser, args)
      if(login_response['status'] == 500):
        # Close Browser
        browser.quit()
        return login_response

      response = {}
      response = helper.new_search(browser, args, states['reins_login'], args['first_ten'])
      
      # Close Browser
      browser.quit()

      return response
    except:
      
      # Clear Browser
      browser.quit()
      
      return {
        'status' : 500,
        'message' : 'Server Error.'
      }

class TokyuSearchProperty(Resource):
  def post(self,  scraping_type):
    tokyu_controller = TokyuScraping.TokyuScraping()
    response = tokyu_controller.switch(scraping_type, dynamic_args, states['tokyu_browser'])
    # Merge Browser States
    states['tokyu_browser'] = states['tokyu_browser'] | response['states']
    # Update Browser Terminate Time
    browser_id_args = dynamic_args.parse_args()
    states['terminate_browser'][browser_id_args['browser_id']] = datetime.datetime.now()
    if ('detail_browser' in response):
      states['terminate_browser']['tokyu_detail'] = datetime.datetime.now()


    return response['data']
  
  @app.teardown_request
  def teardown_request_callback(exception):
    date_now = datetime.datetime.now()
    # Loop thru Terminate List
    terminate_browser_list = copy.deepcopy(states['terminate_browser'])
    for browser_id, last_update in terminate_browser_list.items():
      if ((date_now - last_update).total_seconds() > max_limit):
        in_browser = False
        # If 3 minutes old, Check if still on browser
        for site_browser in browser_list:
          if(browser_id in site_browser):
            in_browser = True
            site_browser[browser_id].quit()
            site_browser[browser_id] = None
            del site_browser[browser_id]
            break
          else:
            continue
        # Else Pop
        if (not in_browser):
          del states['terminate_browser'][browser_id]
  

class SumitomoSearchProperty(Resource):
  def post(self, scraping_type):
    sumitomo_controller = SumitomoScraping.SumitomoScraping()
    response = sumitomo_controller.switch(scraping_type, dynamic_args, states['sumitomo_browser'])
    # Merge Browser States
    # states['sumitomo_browser'] = states['sumitomo_browser'] | response['states']
    if ('detail_browser' in response):
      states['terminate_browser']['sumitomo_detail'] = datetime.datetime.now()
    return response['data']

class AtbbSearchProperty(Resource):
    def post(self, scraping_type):
      atbb_controller = AtbbScraping.AtbbScraping()
      response = atbb_controller.switch(scraping_type, dynamic_args, states['atbb_browser'])
      # Merge Browser States
      # states['atbb_browser'] = states['atbb_browser'] | response['states']
      return response['data']

class ItandibbSearchProperty(Resource):
  def post(self, scraping_type):
    itandibb_controller = ItandiScraping.ItandiScraping()
    response = itandibb_controller.switch(scraping_type, dynamic_args, states['itandibb_browser'])
    # Merge Browser States
    states['itandibb_browser'] = states['itandibb_browser'] | response['states']
    # Update Browser Terminate Time
    browser_id_args = dynamic_args.parse_args()
    states['terminate_browser'][browser_id_args['browser_id']] = datetime.datetime.now()
    if ('detail_browser' in response):
      states['terminate_browser']['itandi_detail'] = datetime.datetime.now()

    return response['data']
  
  @app.teardown_request
  def teardown_request_callback(exception):
    date_now = datetime.datetime.now()
    # Loop thru Terminate List
    terminate_browser_list = copy.deepcopy(states['terminate_browser'])
    for browser_id, last_update in terminate_browser_list.items():
      if ((date_now - last_update).total_seconds() > max_limit):
        in_browser = False
        # If 3 minutes old, Check if still on browser
        for site_browser in browser_list:
          if(browser_id in site_browser):
            in_browser = True
            site_browser[browser_id].quit()
            site_browser[browser_id] = None
            del site_browser[browser_id]
            break
          else:
            continue
        # Else Pop
        if (not in_browser):
          del states['terminate_browser'][browser_id]
  

class MitsuiSearchProperty(Resource):
  def post(self,  scraping_type):
    mitsui_controller = MitsuiScraping.MitsuiScraping()
    response = mitsui_controller.switch(scraping_type, dynamic_args, states['mitsui_browser'])
    # Merge Browser States
    states['mitsui_browser'] = states['mitsui_browser'] | response['states']
    # Update Browser Terminate Time
    browser_id_args = dynamic_args.parse_args()
    states['terminate_browser'][browser_id_args['browser_id']] = datetime.datetime.now()
    if ('detail_browser' in response):
      states['terminate_browser']['mitsui_detail'] = datetime.datetime.now()

    return response['data']
  
  @app.teardown_request
  def teardown_request_callback(exception):
    date_now = datetime.datetime.now()
    # Loop thru Terminate List
    terminate_browser_list = copy.deepcopy(states['terminate_browser'])
    for browser_id, last_update in terminate_browser_list.items():
      if ((date_now - last_update).total_seconds() > max_limit):
        in_browser = False
        # If 3 minutes old, Check if still on browser
        for site_browser in browser_list:
          if(browser_id in site_browser):
            in_browser = True
            site_browser[browser_id].quit()
            site_browser[browser_id] = None
            del site_browser[browser_id]
            break
          else:
            continue
        # Else Pop
        if (not in_browser):
          del states['terminate_browser'][browser_id]
  

api.add_resource(TokyuSearchProperty, "/api/tokyu/<scraping_type>")
api.add_resource(MitsuiSearchProperty, "/api/mitsui/<scraping_type>")
api.add_resource(SumitomoSearchProperty, "/api/sumitomo/<scraping_type>")
api.add_resource(ReinsSearchProperty, "/api/reins/search_property")
api.add_resource(AtbbSearchProperty, "/api/atbb/<scraping_type>")
api.add_resource(ItandibbSearchProperty, "/api/itandibb/<scraping_type>")


if __name__ == "__main__":
  app.run(host='127.0.0.1', port=8080, debug=False)
# serve(app, host='0.0.0.0', port=80, threads = 1)
