<?php
    
    /**
     * globals.php
     *
     * Holds the global variables for:
     * - rest services naming conventions
     * - rest services urls 
     * - default input arguments 
     * - user input help messages
     * - rest service response status and messages
     * 
     * LICENSE:
     * 
     * Copyright European Union 2002-2017
     * 
     * Licensed under the EUPL, Version 1.1 or – as soon they 
     * will be approved by the European Commission - subsequent  
     * versions of the EUPL (the "Licence"); 
     * You may not use this work except in compliance with the 
     * Licence. 
     * You may obtain a copy of the Licence at: 
     *
     * http://ec.europa.eu/idabc/eupl.html
     *
     * Unless required by applicable law or agreed to in 
     * writing, software distributed under the Licence is 
     * distributed on an "AS IS" basis, 
     * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either 
     * express or implied. 
     * See the Licence for the specific language governing 
     * permissions and limitations under the Licence. 
     *
     * @category   europass
     * @package    europass_service_includes
     * @copyright  Copyright (c) European Union 2002-2017
     * @license    EUPL, Version 1.1
     * @version    1.0.0
     * @link       
     * @since      File available since Release 1.0.0
     * @author
     */

    namespace europass\example;

    // NAMING CONVENTIONS FOR XML TO OTHER FORMATS
    $GLOBALS['EUROPASS_RS_XML'] = 'XMLto';
    $GLOBALS['EUROPASS_RS_XML_TO_JSON'] = $GLOBALS['EUROPASS_RS_XML'].'JSON';
    $GLOBALS['EUROPASS_RS_XML_TO_WORD'] = $GLOBALS['EUROPASS_RS_XML'].'WORD';
    $GLOBALS['EUROPASS_RS_XML_TO_ODT'] = $GLOBALS['EUROPASS_RS_XML'].'ODT';
    $GLOBALS['EUROPASS_RS_XML_TO_PDF'] = $GLOBALS['EUROPASS_RS_XML'].'PDF';
    $GLOBALS['EUROPASS_RS_XML_TO_PDF_CV'] = $GLOBALS['EUROPASS_RS_XML_TO_PDF'].'_CV';
    $GLOBALS['EUROPASS_RS_XML_TO_PDF_CV_ESP'] = $GLOBALS['EUROPASS_RS_XML_TO_PDF_CV'].'_ESP';
    $GLOBALS['EUROPASS_RS_XML_TO_PDF_ESP'] = $GLOBALS['EUROPASS_RS_XML_TO_PDF'].'_ESP';

    // NAMING CONVENTIONS FOR JSON TO OTHER FORMATS
    $GLOBALS['EUROPASS_RS_JSON'] = 'JSONto';

    $GLOBALS['EUROPASS_RS_JSON_TO_XML'] = $GLOBALS['EUROPASS_RS_JSON'].'XML';
    $GLOBALS['EUROPASS_RS_JSON_TO_XML_CV'] = $GLOBALS['EUROPASS_RS_JSON_TO_XML'].'_CV';
    $GLOBALS['EUROPASS_RS_JSON_TO_XML_CV_ESP'] = $GLOBALS['EUROPASS_RS_JSON_TO_XML_CV'].'_ESP';
    $GLOBALS['EUROPASS_RS_JSON_TO_XML_ESP'] = $GLOBALS['EUROPASS_RS_JSON_TO_XML'].'_ESP';

    $GLOBALS['EUROPASS_RS_JSON_TO_WORD'] = $GLOBALS['EUROPASS_RS_JSON'].'WORD';
    $GLOBALS['EUROPASS_RS_JSON_TO_ODT'] = $GLOBALS['EUROPASS_RS_JSON'].'ODT';
    $GLOBALS['EUROPASS_RS_JSON_TO_PDF'] = $GLOBALS['EUROPASS_RS_JSON'].'PDF';
    $GLOBALS['EUROPASS_RS_JSON_TO_PDF_CV'] = $GLOBALS['EUROPASS_RS_JSON_TO_PDF'].'_CV';
    $GLOBALS['EUROPASS_RS_JSON_TO_PDF_CV_ESP'] = $GLOBALS['EUROPASS_RS_JSON_TO_PDF_CV'].'_ESP';
    $GLOBALS['EUROPASS_RS_JSON_TO_PDF_ESP'] = $GLOBALS['EUROPASS_RS_JSON_TO_PDF'].'_ESP';

    // NAMING CONVENTION FOR XML UPGRADE
    $GLOBALS['EUROPASS_RS_XML_TO_UPGRADE'] = 'XMLtoUPGRADE';

    // NAMING CONVENTION FOR PDF's XML EXTRACTION
    $GLOBALS['EUROPASS_RS_PDF_TO_XML_EXTRACT'] = 'PDFtoXML_EXTRACT';

    // SERVICES BASE URL
    $GLOBALS['EUROPASS_RS_BASE_URL'] = 'https://europass.cedefop.europa.eu/rest/v1/';

    // XML TO OTHER FORMATS SERVICES URLs
    $GLOBALS['EUROPASS_RS_XML_TO_JSON_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'document/to/json';
    $GLOBALS['EUROPASS_RS_XML_TO_WORD_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'document/to/word';
    $GLOBALS['EUROPASS_RS_XML_TO_ODT_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'document/to/opendoc';
    $GLOBALS['EUROPASS_RS_XML_TO_PDF_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'document/to/pdf';
    $GLOBALS['EUROPASS_RS_XML_TO_PDF_CV_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'document/to/pdf-cv';
    $GLOBALS['EUROPASS_RS_XML_TO_PDF_CV_ESP_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'document/to/pdf-esp';
    $GLOBALS['EUROPASS_RS_XML_TO_PDF_ESP_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'document/to/pdf';

    // JSON TO OTHER FORMATS SERVICES URLs

    $GLOBALS['EUROPASS_RS_JSON_TO_XML_CV_ESP_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'document/to/xml';
    $GLOBALS['EUROPASS_RS_JSON_TO_XML_CV_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'document/to/xml-cv';
    $GLOBALS['EUROPASS_RS_JSON_TO_XML_ESP_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'document/to/xml-esp';

    $GLOBALS['EUROPASS_RS_JSON_TO_WORD_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'document/to/word';
    $GLOBALS['EUROPASS_RS_JSON_TO_ODT_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'document/to/opendoc';
    $GLOBALS['EUROPASS_RS_JSON_TO_PDF_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'document/to/pdf';
    $GLOBALS['EUROPASS_RS_JSON_TO_PDF_CV_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'document/to/pdf-cv';
    $GLOBALS['EUROPASS_RS_JSON_TO_PDF_CV_ESP_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'document/to/pdf-esp';
    $GLOBALS['EUROPASS_RS_JSON_TO_PDF_ESP_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'document/to/pdf';

    // NAMING CONVENTION FOR XML UPGRADE
    $GLOBALS['EUROPASS_RS_XML_TO_UPGRADE_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'upgrade';

    // NAMING CONVENTION FOR PDF's XML EXTRACTION
    $GLOBALS['EUROPASS_RS_PDF_TO_XML_EXTRACT_URL'] = $GLOBALS['EUROPASS_RS_BASE_URL'].'extract-xml-attachment';

	// DEFAULT ARGUMENTS WHEN ONLY SERVICE NAME IS GIVEN
    $GLOBALS['EUROPASS_RS_INPUT_XML'] = 'input-files/Europass-CV-Smith.xml';
    $GLOBALS['EUROPASS_RS_INPUT_JSON'] = 'input-files/Europass-CV-Smith.json';
    $GLOBALS['EUROPASS_RS_INPUT_PDF'] = 'input-files/Europass-CV-Smith-PDF-CV.pdf';  
    $GLOBALS['EUROPASS_RS_OUTPUT_XML_TO_JSON'] = 'output-files/Europass-CV-Smith_FROM_XML.json';
    $GLOBALS['EUROPASS_RS_OUTPUT_XML_TO_WORD'] = 'output-files/Europass-CV-Smith_FROM_XML.doc';
    $GLOBALS['EUROPASS_RS_OUTPUT_XML_TO_ODT'] = 'output-files/Europass-CV-Smith_FROM_XML.odt';
    $GLOBALS['EUROPASS_RS_OUTPUT_XML_TO_PDF_CV'] = 'output-files/Europass-CV-Smith_FROM_XML-CV.pdf';
    $GLOBALS['EUROPASS_RS_OUTPUT_XML_TO_PDF_CV_ESP'] = 'output-files/Europass-CV-Smith_FROM_XML-CV-ESP.pdf';
    $GLOBALS['EUROPASS_RS_OUTPUT_XML_TO_PDF_ESP'] = 'output-files/Europass-CV-Smith_FROM_XML-ESP.pdf';
    $GLOBALS['EUROPASS_RS_OUTPUT_JSON_TO_XML_CV'] = 'output-files/Europass-CV-Smith_FROM_JSON_CV.xml';
    $GLOBALS['EUROPASS_RS_OUTPUT_JSON_TO_XML_CV_ESP'] = 'output-files/Europass-CV-Smith_FROM_JSON_CV_ESP.xml';
    $GLOBALS['EUROPASS_RS_OUTPUT_JSON_TO_XML_ESP'] = 'output-files/Europass-CV-Smith_FROM_JSON_ESP.xml';
    $GLOBALS['EUROPASS_RS_OUTPUT_JSON_TO_WORD'] = 'output-files/Europass-CV-Smith_FROM_JSON.doc';
    $GLOBALS['EUROPASS_RS_OUTPUT_JSON_TO_ODT'] = 'output-files/Europass-CV-Smith_FROM_JSON.odt';
    $GLOBALS['EUROPASS_RS_OUTPUT_JSON_TO_PDF_CV'] = 'output-files/Europass-CV-Smith_FROM_JSON-CV.pdf';
    $GLOBALS['EUROPASS_RS_OUTPUT_JSON_TO_PDF_CV_ESP'] = 'output-files/Europass-CV-Smith_FROM_JSON-CV-ESP.pdf';
    $GLOBALS['EUROPASS_RS_OUTPUT_JSON_TO_PDF_ESP'] = 'output-files/Europass-CV-Smith_FROM_JSON-ESP.pdf';
    $GLOBALS['EUROPASS_RS_OUTPUT_XML_TO_UPGRADE'] = 'output-files/Europass-CV-Smith_XML_UPGRADED.xml';
    $GLOBALS['EUROPASS_RS_OUTPUT_PDF_TO_XML_EXTRACT'] = 'output-files/Europass-CV-Smith_XML_EXCTRACTED_FROM_PDF.xml';

    $GLOBALS['EUROPASS_RS_LOCALE'] = 'en';
        
    // USER INPUT ERROR MESSAGES

    $GLOBALS['INPUT_ERROR_MISSING_ARGUMENS'] = 'ERROR: MISSING ARGUMENTS';
    $GLOBALS['INPUT_ERROR_BAD_ARGUMENS'] = 'ERROR: BAD ARGUMENTS SYNTAX';
    $GLOBALS['INPUT_ERROR_UNKNOWN_SERVICE'] = 'ERROR: SERVICE NOT FOUND';

    // USER INPUT HELP MESSAGES
    
    $GLOBALS['EUROPASS_RS_HELP'] = 
                "\nEUROPASS PHP REST SERVICES HANDLER HELP:\n\n".   
                "COMMAND USAGE: (arguments in brackets are optional)".
                "\nphp -f convert.php <service> [-input <file> | -output <file> | -url <service-url> | -locale <locale>]".
                "\nphp -f convert.php <service> [-input <file> -output <file>][ -url<service-url> | -locale <locale> | -url <service-url> -locale <locale>]".
                "\n\nARGUMENTS:".
                "\n<service>: The Rest Services Name Convention (type php -f convert.php -list for more)".
                "\n-input: Specify custom XML or JSON file to convert".
                "\n-output: Specify the file name and path to be created".
                "\n-url: Specify a custom url for the service given".
                "\n-locale: The locale to be used for the conversion".
                "\n\nOTHER COMMANDS:".
                "\nhelp: Display this help".
                "\nlist: Display the Rest Services Name Convention list";
	
    $GLOBALS['EUROPASS_RS_LIST'] = "\nRest Services Names List:\n".
                                   "\nWith XML input:\n".
                                   "\t".$GLOBALS['EUROPASS_RS_XML_TO_JSON']."\n".
                                   "\t".$GLOBALS['EUROPASS_RS_XML_TO_WORD']."\n".
                                   "\t".$GLOBALS['EUROPASS_RS_XML_TO_ODT']."\n".
                                   "\t".$GLOBALS['EUROPASS_RS_XML_TO_PDF_ESP']."\n".
                                   "\t".$GLOBALS['EUROPASS_RS_XML_TO_PDF_CV']."\n".
                                   "\t".$GLOBALS['EUROPASS_RS_XML_TO_PDF_CV_ESP']."\n".
                                   "With JSON input:\n".
                                   "\t".$GLOBALS['EUROPASS_RS_JSON_TO_XML_CV']."\n".
                                   "\t".$GLOBALS['EUROPASS_RS_JSON_TO_XML_CV_ESP']."\n".
                                   "\t".$GLOBALS['EUROPASS_RS_JSON_TO_XML_ESP']."\n".
                                   "\t".$GLOBALS['EUROPASS_RS_JSON_TO_WORD']."\n".
                                   "\t".$GLOBALS['EUROPASS_RS_JSON_TO_ODT']."\n".
                                   "\t".$GLOBALS['EUROPASS_RS_JSON_TO_PDF_ESP']."\n".
                                   "\t".$GLOBALS['EUROPASS_RS_JSON_TO_PDF_CV']."\n".
                                   "\t".$GLOBALS['EUROPASS_RS_JSON_TO_PDF_CV_ESP']."\n".
                                   "Other Services:\n".
                                   "\t".$GLOBALS['EUROPASS_RS_XML_TO_UPGRADE']."\n".
                                   "\t".$GLOBALS['EUROPASS_RS_PDF_TO_XML_EXTRACT']."\n";

    // REST SERVICE RESPONSE MESSAGES

    $GLOBALS['EUROPASS_RS_REQUEST_OK'] = 'REST service request executed successfully.';
    $GLOBALS['EUROPASS_RS_REQUEST_FAIL'] = 'Error executing REST service request...';
    
    // FILE OUTPUT MESSAGE

    $GLOBALS['FILE_OUTPUT_MESSAGE'] = 'Created File: ';
