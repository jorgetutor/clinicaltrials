# ClinicalTrials Web Service Guzzle Client

Provides an implementation of the Guzzle library to query ClinicalTrials Web Service.

NCI Clinical Trials Search API
For information on NCI's efforts to improve how patients and oncologists find information and learn about cancer clinical trials please visit:
https://www.cancer.gov/syndication/api

- https://clinicaltrialsapi.cancer.gov/

## Usage

To use the ClinicalTrials API Client simply instantiate the client.

```php
<?php

require dirname(__FILE__).'/../vendor/autoload.php';

use Tutor\ClinicalTrials\ClinicalTrialsClient;
$client = ClinicalTrialsClient::factory();

// if you want to see what is happening, add debug => true to the factory call
$client = ClinicalTrialsClient::factory(['debug' => true]);
```

Invoke Commands using the `__call` method (auto-complete phpDocs are included)

```php
<?php

$client = ClinicalTrialsClient::factory();
$response = $client->query([
  'brief_title_fulltext' => 'diabetes',
]);

```

Or Use the `getCommand` method (in this case you need to work with the $response['data'] array:

```php
<?php

$client = ClinicalTrialsClient::factory();

//Retrieve the Command from Guzzle
$command = $client->getCommand('Query', [
  'brief_title_fulltext' => 'diabetes',
]);
$command->prepare();

$response = $command->execute();

$data = $response['data'];

```

## Examples
You can execute the examples in the examples directory.

You can look at the services.json for details on what methods are available and what parameters are available to call them.

https://clinicaltrialsapi.cancer.gov/v1/clinical-trials?eligibility.structured.gender=female&brief_summary_fulltext=%22diabetes%22

```php
<?php

$client = ClinicalTrialsClient::factory();
$response = $client->query([
  'eligibility.structured.gender' => 'female',
  'brief_summary_fulltext' => 'diabetes',
]);

```

## TODO

- [ ] Add all query fields
- [ ] Add some more examples
- [ ] Add tests
- [ ] Add some Response models

## Contributions welcome

Found a bug, open an issue, preferably with the debug output and what you did.
Bugfix? Open a Pull Request and I'll look into it.

## License

The use ClinicalTrials\ClinicalTrialsClient API client is available under an MIT License.
