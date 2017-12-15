<?php

    /**
     * convert.php
     *
     * Uses the RestServicesHandler class to execute a request to 
     * a specific Europass REST service, given the user input
     * 
     * LICENSE:
     * 
     * Copyright European Union 2002-2010
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
     * @copyright  Copyright (c) European Union 2002-2017
     * @license    EUPL, Version 1.1
     * @version    1.0.0
     * @link       
     * @since      File available since Release 1.0.0
     * @author
     */

	namespace europass\example;

	include 'RestServicesHandler.php';
	include 'includes\globals.php';
	
    // Get RestServicesHandler instance
	$rsHandlerInstance = RestServicesHandler::getInstance();
    // Parse user input and get arguments
	$argumentsArray = $rsHandlerInstance->parseInputArguments($argc,$argv);

    // Check if user entered list or help command, or invalid input and exit or continue
	if(array_key_exists('command',$argumentsArray)){
        echo $argumentsArray['text'];
        exit(0);
    }
	else if(array_key_exists('error',$argumentsArray)){
		echo $argumentsArray['message'];
		exit(1);
	}

    // Construct service attributes based on user input
	$serviceAttrs = $rsHandlerInstance->constructServiceAttributes($argumentsArray);
	// Execute request to the service
	$requestResults = $rsHandlerInstance->executeRequest($serviceAttrs);	
	// display the service's response
	$rsHandlerInstance->displayResponseResult($requestResults);
	