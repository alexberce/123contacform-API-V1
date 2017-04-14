<?php

namespace ContactForm\Api\V1\Resources;

use ContactForm\Api\V1\ApiClient;
use ContactForm\Api\V1\Models\FormModel;
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

		$resourcePath = "/forms.json";
		
		list($response, $statusCode, $httpHeader) = $this->apiClient->callApi($resourcePath, 'GET');
		
		if (!$response) {
			return array(null, $statusCode, $httpHeader);
		}
		
		return ObjectTransformer::transform($response, ObjectTransformer::FORM_TRANSFORMER);
	}
	
	/**
	 * @param $id
	 *
	 * @return FormModel
	 */
	public function getForm($id){
		
		$resourcePath = "/forms/{$id}.json";
		
		list($response, $statusCode, $httpHeader) = $this->apiClient->callApi($resourcePath, 'GET');
		
		return current(ObjectTransformer::transform($response, ObjectTransformer::FORM_TRANSFORMER));
	}
}