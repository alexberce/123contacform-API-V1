<pre><?php
use ContactForm\Api\V1\ApiClient;
use ContactForm\Api\V1\Resources\Forms;

require_once '../vendor/autoload.php';

$apiClient = (new ApiClient())
	->withApiKey('APY-KEY-HERE');
$formId = 'FORM-ID-HERE';

/** @var $fields \ContactForm\Api\V1\Models\FieldModel[] */
$fields = (new Forms($apiClient))->getFormFields($formId);

foreach($fields as $field){
	echo $field->getId() . '. ' . $field->getTitle() . ' (' . $field->getFieldInstructions() . ')' . "<br />";
}