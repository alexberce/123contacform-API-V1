<?php

namespace ContactForm\Api\V1\ObjectTransformers;

use ContactForm\Api\V1\Models\FormModel;

class FormTransformer implements ObjectTransformerInterface
{
	
	/**
	 * @param $xmlData
	 *
	 * @return array
	 */
	function transform($xmlData)
	{
		$forms = array();
		
		$xml = simplexml_load_string($xmlData, "SimpleXMLElement", LIBXML_NOCDATA);
		$jsonDecodedForms = current(json_decode(json_encode($xml), true));
		
		foreach($jsonDecodedForms as $jsonDecodedForm)
			$forms[] = new FormModel((object) $jsonDecodedForm);
		
		return $forms;
	}
}