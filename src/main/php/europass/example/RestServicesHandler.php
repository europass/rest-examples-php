<?php

/**
 * RestServicesHandler.php
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
 * @package    europass_service
 * @subpackage europass_service_RestServicesHandler
 * @copyright  Copyright (c) European Union 2002-2017
 * @license    EUPL, Version 1.1
 * @version    1.0.0
 * @link       
 * @since      File available since Release 1.0.0
 * @author
 */

namespace europass\example;

include 'includes\globals.php';

/**
 * RestServicesHandler class
 *
 * Singleton that handles the user input, the services dispatching and
 * services attributes collection, the request execution and the display 
 * of the request execution results
 *
 */

class RestServicesHandler {

    static private $instance = null;
    static private $rsNamesArray = null;
    static private $rsInputArgsArray = null;
    static private $absolutePath = '';

    /**
     * Class constructor 
     * 
     * Fills the $rsNamesArray array with the rest services naming convention strings
     * Fills the $rsInputArgsArray array with the valid command arguments
     */
	private function __construct(){

        self::$rsNamesArray = array(

            $GLOBALS['EUROPASS_RS_XML_TO_JSON'],
            $GLOBALS['EUROPASS_RS_XML_TO_WORD'],
            $GLOBALS['EUROPASS_RS_XML_TO_ODT'],
            $GLOBALS['EUROPASS_RS_XML_TO_PDF_ESP'],
            $GLOBALS['EUROPASS_RS_XML_TO_PDF_CV'],
            $GLOBALS['EUROPASS_RS_XML_TO_PDF_CV_ESP'],

            $GLOBALS['EUROPASS_RS_JSON_TO_XML_CV'],
            $GLOBALS['EUROPASS_RS_JSON_TO_XML_CV_ESP'],
            $GLOBALS['EUROPASS_RS_JSON_TO_XML_ESP'],
            $GLOBALS['EUROPASS_RS_JSON_TO_WORD'],
            $GLOBALS['EUROPASS_RS_JSON_TO_ODT'],
            $GLOBALS['EUROPASS_RS_JSON_TO_PDF_ESP'],
            $GLOBALS['EUROPASS_RS_JSON_TO_PDF_CV'],
            $GLOBALS['EUROPASS_RS_JSON_TO_PDF_CV_ESP'],
            
            $GLOBALS['EUROPASS_RS_XML_TO_UPGRADE'],
            $GLOBALS['EUROPASS_RS_PDF_TO_XML_EXTRACT'],
        );

        self::$rsInputArgsArray = array(
            '-input',
            '-output',
            '-locale',
            '-url',
        );
        
        self::$absolutePath = dirname(__FILE__).'/';
    }

    /**
     * Creates a new class instance if none, and always call that same instance
     *
     * @return <RestServicesHandler> instance
     */
    static public function getInstance() {
         if (null === self::$instance) {
             self::$instance = new self;
         }
         return self::$instance;
    }

    /**
     * Parses convert.php script Usage (arguments in brackets are optional):
     * 
     * php -f convert.php <service> 
     * [-input <file> | -output <file> | -url <service-url> | -locale <locale>]
     * 
     * php -f convert.php <service> 
     * [-input <file> -output <file>]
     * [-url <service-url> | -locale <locale> | -url <service-url> -locale <locale>]
     * 
     * Checks whether or not exist any input errors and return result accordingly
     * 
     * @param int $argc
     * @param array $argv
     * @return array $result
     */

    public function parseInputArguments($argc,$argv){

        $result = array();
		
		// Get obligatory argument service name (can also be a help or list command)
		if($argc >= 2 && $argc <= 10 && $argc%2 != 1){
		
          	// in case of a command store the command type and 
           	//the text to be displayed from $GLOBALS
            if($argv[1] == 'help' || $argv[1] == 'list'){
            	$result['command'] = $argv[1];
            	$result['text'] = $GLOBALS['EUROPASS_RS_'.mb_strtoupper($argv[1])];
            	return $result;
            }
            else if(!in_array($argv[1],self::$rsNamesArray)){
                $result['error'] = true;
                $result['message'] = $GLOBALS['INPUT_ERROR_UNKNOWN_SERVICE'].": '$argv[1]'\n".
                                     $GLOBALS['EUROPASS_RS_LIST'];
                return $result;
            } 
            else{
            	$result['restservice'] = $argv[1];
            }
            
            if($argc == 4){
                // when one extra command argument, it can be
                // either -input, -output, -url, or -locale
                
                // check in command argument list
                if(!in_array($argv[2],self::$rsInputArgsArray)){
                    $result['error'] = true;
                    $result['message'] = $GLOBALS['INPUT_ERROR_BAD_ARGUMENS'].
                                             "\n".$GLOBALS['EUROPASS_RS_HELP'];
                    return $result;
                }else{
                    //Dispose starting '-' char from string
                    $index = substr($argv[2],1,strlen($argv[2]));
                    $result[$index] = $argv[3];
                }
            }
            
            if($argc >= 6){
            
                // when two extra command arguments given, they must be -input and -output
                if($argv[2] != '-input' || $argv[4] != '-output'){
                    $result['error'] = true;
                    $result['message'] = $GLOBALS['INPUT_ERROR_BAD_ARGUMENS'].
                                             "\n".$GLOBALS['EUROPASS_RS_HELP'];
                    return $result;
                }else{
                	$result['input'] = $argv[3];
                    $result['output'] = $argv[5];
                }
            
                if($argc >= 8){
            	
                	// the third extra command argument must be url
                    if($argv[6] != '-url' && $argv[6] != '-locale'){
                        $result['error'] = true;
                        $result['message'] = $GLOBALS['INPUT_ERROR_BAD_ARGUMENS'].
                                             "\n".$GLOBALS['EUROPASS_RS_HELP'];
                        return $result;
                    }
                    else{
                        //Dispose starting '-' char from string
                        $index = substr($argv[6],1,strlen($argv[6]));
                        $result[$index] = $argv[7];
                    }

                    if($argc == 10){
            	
                    	// the fourth extra command argument must be locale
            	
                        if($argv[6] != '-url' && $argv[8] != '-locale'){
                            $result['error'] = true;
                            $result['message'] = $GLOBALS['INPUT_ERROR_BAD_ARGUMENS'].
                                                 "\n".$GLOBALS['EUROPASS_RS_HELP'];
                            return $result;
    			        }
                        else{
                        	$result['url'] = $argv[7];
                            $result['locale'] = $argv[9];
                        }
                    }
                }
            }
        }
        else{
            $result['error'] = true;
            $result['message'] = $GLOBALS['INPUT_ERROR_MISSING_ARGUMENS'].
                                 "\nUsage: ".$GLOBALS['EUROPASS_RS_HELP'];
            return $result;
        }


        return $result;
    }

    /**
     * Constructs Service's Attributes (input,output files, headers information, 
     * content-data) and stores them into $serviceAttributes array
     * 
     * @param array $userInput
     * @return array $serviceAttributes
     */

    public function constructServiceAttributes($userInput){

        $serviceAttributes = array();

        // Get the service name
        $serviceName = $userInput['restservice'];
		echo $serviceName;
        
        // Services Name Convention is given with the pattern <DOCUMENT TYPE>to<DOCUMENT TYPE> so that
        // $serviceName can be split by "to" string to get input and output types to $conversionArray array
        // (ex: "JSONtoPDF_CV" is stored as $conversionArray[0] = "JSON", $conversionArray[1] = "PDF_CV")
        // and construct the $GLOBALS index to get input & output files description default values
        $conversionArray = explode("to", $serviceName);

        // Using $conversionArray we construct the indexes to input & output files description default values
        $inputIndex = 'EUROPASS_RS_INPUT_'.$conversionArray[0];
        $fileInput = self::$absolutePath.$GLOBALS[$inputIndex];
        
        $outputIndex = 'EUROPASS_RS_OUTPUT_'.$conversionArray[0].'_TO_'.$conversionArray[1];
        $fileOutput = self::$absolutePath.$GLOBALS[$outputIndex];

        // Using $conversionArray we construct the url index to get the service's url from $GLOBAL
        $urlIndex = 'EUROPASS_RS_'.$conversionArray[0].'_TO_'.$conversionArray[1].'_URL';
        $url = $GLOBALS[$urlIndex];

        // Get default locale
        $locale = $GLOBALS['EUROPASS_RS_LOCALE'];
        
        // Check if input is given by the user
        if(array_key_exists('input',$userInput))
        	$fileInput = $userInput['input'];
        
        // Check if output is given by the user
        if(array_key_exists('output',$userInput))
        	$fileOutput = $userInput['output'];

        // Check if url is given by the user
        if(array_key_exists('url',$userInput)){    
           $url = $userInput['url'];
        }

        // Check if locale is given by the user
        if(array_key_exists('locale',$userInput))
        	$locale = $userInput['locale'];

        // Get data from user input file
        $data = file_get_contents($fileInput);

        // store Service Attributes to serviceAttributes array
        
        $serviceAttributes['outputFile'] = $fileOutput;
        $serviceAttributes['url'] = $url;
        $serviceAttributes['locale'] = $locale;
        $serviceAttributes['data'] = $data;
        $serviceAttributes['content-length'] = strlen($data);

        // dispatch service names and set service attributes (content-type,accept) accordingly 
        switch($serviceName){

            // XML to other formats
            case $GLOBALS['EUROPASS_RS_XML_TO_JSON']:
                $serviceAttributes['content-type'] = 'application/xml';
                $serviceAttributes['accept'] = 'application/json';
                break;

            case $GLOBALS['EUROPASS_RS_XML_TO_WORD']:
                $serviceAttributes['content-type'] = 'application/xml';
                $serviceAttributes['accept'] = 'application/msword';
                break;

            case $GLOBALS['EUROPASS_RS_XML_TO_ODT']:
                $serviceAttributes['content-type'] = 'application/xml';
                $serviceAttributes['accept'] = 'application/vnd.oasis.opendocument.text';
                break;

            case $GLOBALS['EUROPASS_RS_XML_TO_PDF_ESP']:
            case $GLOBALS['EUROPASS_RS_XML_TO_PDF_CV']:
            case $GLOBALS['EUROPASS_RS_XML_TO_PDF_CV_ESP']:
                $serviceAttributes['content-type'] = 'application/xml';
                $serviceAttributes['accept'] = 'application/pdf';
                break;

            // JSON to other formats
            case $GLOBALS['EUROPASS_RS_JSON_TO_XML_CV']:
                $serviceAttributes['content-type'] = 'application/json';
                $serviceAttributes['accept'] = 'application/xml';
                break;
            // JSON to other formats
            case $GLOBALS['EUROPASS_RS_JSON_TO_XML_CV_ESP']:
                $serviceAttributes['content-type'] = 'application/json';
                $serviceAttributes['accept'] = 'application/xml';
                break;
            // JSON to other formats
            case $GLOBALS['EUROPASS_RS_JSON_TO_XML_ESP']:
                $serviceAttributes['content-type'] = 'application/json';
                $serviceAttributes['accept'] = 'application/xml';
                break;

            case $GLOBALS['EUROPASS_RS_JSON_TO_WORD']:
                $serviceAttributes['content-type'] = 'application/json';
                $serviceAttributes['accept'] = 'application/msword';
                break;

            case $GLOBALS['EUROPASS_RS_JSON_TO_ODT']:
                $serviceAttributes['content-type'] = 'application/json';
                $serviceAttributes['accept'] = 'application/vnd.oasis.opendocument.text';
                break;

            case $GLOBALS['EUROPASS_RS_JSON_TO_PDF_ESP']:
            case $GLOBALS['EUROPASS_RS_JSON_TO_PDF_CV']:
            case $GLOBALS['EUROPASS_RS_JSON_TO_PDF_CV_ESP']:
                $serviceAttributes['content-type'] = 'application/json';
                $serviceAttributes['accept'] = 'application/pdf';
                break;

            // Other Services
            case $GLOBALS['EUROPASS_RS_XML_TO_UPGRADE']:
                $serviceAttributes['content-type'] = 'application/xml';
                $serviceAttributes['accept'] = 'application/xml';
                break;

            case $GLOBALS['EUROPASS_RS_PDF_TO_XML_EXTRACT']:
                $serviceAttributes['content-type'] = 'application/pdf';
                $serviceAttributes['accept'] = 'application/xml';
                break;

            default: $serviceAttributes = null;
                return $serviceAttributes;
        }

        return $serviceAttributes;
    }

    /**
     * Executes the REST Post Request using PHP's curl library. Stores the results in
     * the $requestResult array
     *
     * @param array $attributes
     * @return array $requestResult
     */
	
    public function executeRequest($attributes){

        $requestResult = array();

		// init curl
        $ch = curl_init();

		// set curl options
        curl_setopt($ch, CURLOPT_URL,$attributes['url']);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, 
                            array('Content-Type: '.$attributes['content-type'],
                                  'Content-length: '.$attributes['content-length'],
                                  'Accept: '.$attributes['accept'],
                                  'Accept-Language:'.$attributes['locale'],
                            )
                        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $attributes['data']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// execute request
        $server_output = curl_exec($ch);
        
        //get status, errormessage and close
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $errmsg = curl_error($ch);
        curl_close($ch);

        // Store output file to path
        if(false !== file_put_contents($attributes['outputFile'], $server_output))
            $requestResult['output'] = $attributes['outputFile'];

        $requestResult['status'] = $http_status;
        $requestResult['message'] = $errmsg;

        return $requestResult;
    }

    /**
     * Displays the request execution result
     *
     * @param array $result
     */

    function displayResponseResult($result){

        if($result['status'] != 200){
            echo "\n".$GLOBALS['EUROPASS_RS_REQUEST_FAIL']."\n".$result['message']."\n";
        }else{
            echo "\n".$GLOBALS['EUROPASS_RS_REQUEST_OK']."\n";
            if(array_key_exists('output',$result)){
                echo $GLOBALS['FILE_OUTPUT_MESSAGE'].$result['output']."\n";
            }
        }
    }
}