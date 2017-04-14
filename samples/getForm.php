<?php

use ContactForm\Api\V1\ApiClient;
use ContactForm\Api\V1\Resources\Forms;

require_once '../vendor/autoload.php';

$apiClient = (new ApiClient())
	->withApiKey('APY-KEY-HERE');
$formId = 'FORM-ID-HERE';

/** @var $forms \ContactForm\Api\V1\Models\FormModel[] */
$form = (new Forms($apiClient))->getForm($formId);

echo $form->getId() . '. ' . $form->getName() . ' (' . $form->getNumberOfTotalSubmissions() . ')' . "<br />";