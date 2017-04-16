<?php

namespace ContactForm\Api\V1\Resources;

use ContactForm\Api\V1\ApiClient;
use ContactForm\Api\V1\Models\FieldModel;
use ContactForm\Api\V1\Models\FormModel;
use ContactForm\Api\V1\Models\SubmissionModel;
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
	
	/**
	 * @return FormModel[]
	 */
	public function getForms(){

		$resourcePath = "/forms.json";
		
		list($response, $statusCode, $httpHeader) = $this->apiClient->callApi($resourcePath, 'GET');
		
		if (!$response) {
			return array(null, $statusCode, $httpHeader);
		}
		
		return ObjectTransformer::transform($response, ObjectTransformer::FORM_TRANSFORMER);
	}
	
	/**
	 * @param $formId
	 *
	 * @return FormModel
	 */
	public function getForm($formId){
		
		if (!is_numeric($formId)) {
			throw new \InvalidArgumentException('Invalid $formId parameter type when calling getForm');
		}
		
		$resourcePath = "/forms/{$formId}.json";
		
		list($response, $statusCode, $httpHeader) = $this->apiClient->callApi($resourcePath, 'GET');
		
		return current(ObjectTransformer::transform($response, ObjectTransformer::FORM_TRANSFORMER));
	}
	
	/**
	 * @param $formId
	 *
	 * @return FieldModel[]
	 */
	public function getFormFields($formId){
		
		if (!is_numeric($formId)) {
			throw new \InvalidArgumentException('Invalid $formId parameter type when calling getFormFields');
		}
		
		$resourcePath = "/forms/{$formId}/fields.json";
		
		list($response, $statusCode, $httpHeader) = $this->apiClient->callApi($resourcePath, 'GET');
		
		return ObjectTransformer::transform($response, ObjectTransformer::FIELD_TRANSFORMER);
	}
	
	/**
	 * @param $formId
	 *
	 * @return SubmissionModel[]
	 */
	public function getSubmissions($formId){
		
		if (!is_numeric($formId)) {
			throw new \InvalidArgumentException('Invalid $formId parameter type when calling getSubmissions');
		}
		
		$resourcePath = "/forms/{$formId}/submissions.json";
		
		list($response, $statusCode, $httpHeader) = $this->apiClient->callApi($resourcePath, 'GET');
		
		return ObjectTransformer::transform($response, ObjectTransformer::SUBMISSION_TRANSFORMER);
	}
	
	/**
	 * @param $formId
	 *
	 * @return int
	 */
	public function getSubmissionsCount($formId)
	{
		
		if (!is_numeric($formId)) {
			throw new \InvalidArgumentException('Invalid $formId parameter type when calling getSubmissionsCount');
		}
		
		$resourcePath = "/forms/{$formId}/submissions/count.json";
		
		list($response, $statusCode, $httpHeader) = $this->apiClient->callApi($resourcePath, 'GET');
		
		return (int) $response->submissionsCount;
	}
	
	/**
	 * @param $formId
	 * @param $webHookUrl
	 *
	 * @return array
	 */
	public function addWebHook($formId, $webHookUrl)
	{
		
		if (!is_numeric($formId)) {
			throw new \InvalidArgumentException('Invalid $formId parameter type when calling addWebHook');
		}
		
		if ($webHookUrl === null) {
			throw new \InvalidArgumentException('Missing the required parameter $webHookUrl when calling addWebHook');
		}
		
		$resourcePath = "/forms/{$formId}/webhooks.json";
		
		list($response, $statusCode, $httpHeader) = $this->apiClient->callApi($resourcePath, 'GET', array('webhookUrl' => $webHookUrl));
		
		return ObjectTransformer::transform($response, ObjectTransformer::SUBMISSION_TRANSFORMER);
	}
}