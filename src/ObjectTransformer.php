<?php

namespace ContactForm\Api\V1;

use ContactForm\Api\V1\ObjectTransformers\FormTransformer;

class ObjectTransformer
{
	const FORM_TRANSFORMER = 'Form';
	
	/**
	 * @param $xmlData
	 *
	 * @param $type
	 *
	 * @return array
	 * @throws ApiException
	 */
	public static function transform($xmlData, $type)
	{
		switch($type){
			case 'Form':
				return (new FormTransformer())->transform($xmlData);
				break;
			default:
				throw new ApiException('Transformer of type ' . $type . ' not recognized.');
		}
	}
}