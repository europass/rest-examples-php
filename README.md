rest-examples-php
=================

PHP Client for EWA Rest Web Services for documents conversion 
Version: 1.0.0

SUMMARY:

**_package europass_services_**
 - RestServicesHandler.php: The class that holds the functions implementing user input parsing, service attributes construction, 
 request execution and response results display. 
 - convert.php: The file convert.php is the script that uses RestServicesHandler class to run the service request,
 (equivalent to the java file that holds the main() function) 

**_package europass_services_includes_**
 - globals.php: Holds the global parameters related to the EWA Rest Web Services 
 (like URLs, name conventions, message regarding the response etc), as well as 
 application-specific variables like input help messages 

**USAGE EXAMPLES:**

_Default_:

php -f convert.php <**_service-action-type_**>

Extended: (arguments in brackets are optional)

php -f convert.php <**_service-action-type_**> [**_-input_** <input-file>  **_-output_** <output-file>  **_-url_** <service-url> **_-locale_** <provided-locale>]


Arguments:

<service-action-type>

service-action-type | descr | url extension | 
--- | --- | --- | 
XMLtoPDF_CV_ESP  | XML to PDF CV+ESP | /v1/document/to/pdf |
XMLtoPDF_ESP   | XML to PDF ESP | /v1/document/to/pdf-esp |
XMLtoPDF_CV   | XML to PDF CV | /v1/document/to/pdf-cv | 
XMLtoWORD   | XML to Word | /v1/document/to/word |
XMLtoODT   | XML to ODT | /v1/document/to/opendoc | 
XMLtoJSON   | XML to JSON | /v1/document/to/json |
XMLtoUPGRADE   | XML Upgrade | /v1/document/upgrade |
PDFtoXML_EXTRACT   | XML Extraction | /v1/document/extraction | 
|  |  |  | 
JSONtoPDF_CV_ESP  | JSON to PDF CV+ESP | /v1/document/to/pdf |
JSONtoPDF_ESP  | JSON to PDF ESP | /v1/document/to/pdf-esp |
JSONtoPDF_CV  | JSON to PDF CV | /v1/document/to/pdf-cv | 
JSONtoWORD  | JSON to Word | /v1/document/to/word |
JSONtoODT  | JSON to ODT | /v1/document/to/opendoc | 
JSONtoXML_CV  | JSON to XML CV | /v1/document/to/xml-cv |
JSONtoXML_ESP  | JSON to XML ESP | /v1/document/to/xml-esp |
JSONtoXML_CV_ESP  | JSON to XML CV+ESP | /v1/document/to/xml |


- -input <input-file>: The file the content of who will be used as data content to the Rest Service request. 
    If not given, a sample service-specific input file from input-files folder of europass_service package 
    will be used.
    
- -output <output-file>: The file that will be used to store the contents of the response of the Rest Service. 
    If not given, a sample file will be created in the output-files folder of europass_service.
    
IMPORTANT:
When you pass -input and -output parameters, pay attention to directory formats like 
'Documents and Settings'.In that case double quotes MUST be applied, for example:
php -f convert.php XMLtoPDF_ESP -input "C:\Documents and Settings\jsmith\CVs\myEuropassXML-CV.xml"

- -url <service-url>: The Rest Service url on which the request will be made. 
    If not given, the default service-specific url will be used

- -locale <provided-locale>: The locale that will be used in the Rest Service request. 
    If not given, the default locale (en) will be used

HELP:
- To display details about the script's arguments usage, type 'php -f convert.php <any-action> help'.
    
- To display the list of the services name conventions (argument <service>), 
    type 'php -f convert.php <any-action> list'.
    
NOTE:
Current application was tested on php / CLI (on a Windows installation). Some steps to run:
- Get php (http://nz2.php.net/downloads.php).
- Add php path into Windows PATH. 
- Configure php.ini to enable curl for php(under C:\Windows folder configure php.ini// uncomment extension=curl)
