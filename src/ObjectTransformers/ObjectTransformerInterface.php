<?php


namespace ContactForm\Api\V1\ObjectTransformers;


interface ObjectTransformerInterface
{
	/**
	 * @param $xmlData
	 *
	 * @return array
	 */
	function transform($xmlData);
}