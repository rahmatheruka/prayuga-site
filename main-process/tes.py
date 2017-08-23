#!/usr/bin/env python
# -*- coding: utf-8 -*- 
import sys, getopt
import needed.db_mysql as db_mysql
import helper.preprocessing as preprocessing
import analyzer.impress as impress
import json

def main(argv):
	inputfile = '';
	outputfile = '';

	params = sys.argv;
	kalimat = params[1];
	keyword = preprocessing.do(kalimat);
	hasil   = impress.play(keyword,'eval');

	recordCounting = preprocessing.recordCounting(hasil);
	print json.dumps(recordCounting);
		

if __name__ == "__main__":
	main(sys.argv[1:])