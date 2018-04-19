<?php

require dirname(__FILE__) . '/../../vendor/autoload.php';

use Tutor\ClinicalTrials\ClinicalTrialsClient;

// @see https://clinicaltrialsapi.cancer.gov

$client = ClinicalTrialsClient::factory();

$response = $client->clinicalTrials([
  'size' => 20,
  'brief_title_fulltext' => 'diabetes',
]);
print_r($response);
