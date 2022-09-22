import ast

from flask_restful import reqparse

def parseArgs(args):
  parsedArgs = args.parse_args()
  parsedArgs['cities'] = ast.literal_eval(parsedArgs['cities']) if parsedArgs['cities'] is not None else None
  parsedArgs['ptable'] = ast.literal_eval(parsedArgs['ptable']) if parsedArgs['ptable'] is not None else None
  parsedArgs['fee_min'] = float(parsedArgs['fee_min']) if parsedArgs['fee_min'] != None else 0
  parsedArgs['fee_max'] = float(parsedArgs['fee_max']) if parsedArgs['fee_max'] != None else 0
  parsedArgs['area_min'] = float(parsedArgs['area_min']) if parsedArgs['area_min'] != None else 0
  parsedArgs['area_max'] = float(parsedArgs['area_max']) if parsedArgs['area_max'] != None else 0
  parsedArgs['year_build_min'] = float(parsedArgs['year_build_min']) if parsedArgs['year_build_min'] != None else 0
  parsedArgs['year_build_max'] = float(parsedArgs['year_build_max']) if parsedArgs['year_build_max'] != None else 0
  parsedArgs['from_station'] = float(parsedArgs['from_station']) if parsedArgs['from_station'] != None else 0

  return parsedArgs
