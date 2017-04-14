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
		
		foreach($xmlData->forms as $jsonDecodedForm)
			$forms[] = new FormModel((object) $jsonDecodedForm);
		
		return $forms;
	}
}