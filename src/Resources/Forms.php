<?php

namespace ContactForm\Api\V1\Resources;

use ContactForm\Api\V1\ApiClient;
use ContactForm\Api\V1\ObjectTransformer;

class Forms
{
	/**
	 * API Client
	 * @var ApiClient instance of the ApiClient
	 */
	protected $apiClient;
	
	/**
	 * Constructor
	 * @param ApiClient|null $apiClient The api client to use
	 */
	function __construct($apiClient = null)
	{
		if ($apiClient == null) {
			$apiClient = new ApiClient();
		}
		
		$this->apiClient = $apiClient;
	}
	
	public function getForms(){

		$resourcePath = "/forms.xml";
		
		list($response, $statusCode, $httpHeader) = $this->apiClient->callApi($resourcePath, 'GET');
		
		if (!$response) {
			return array(null, $statusCode, $httpHeader);
		}
		
		return ObjectTransformer::transform($response, ObjectTransformer::FORM_TRANSFORMER);
		//return array($response, $statusCode, $httpHeader);
		
	}
}