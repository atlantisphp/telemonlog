# Telemonlog

## Getting Started
Here is a quick example

*index.php file stored in `/public` directory*

```
<?php

require_once __DIR__.'/../vendor/autoload.php';

use AtlantisPHP\Telemonlog\{LogHandler, Output as Log};

LogHandler::$disk = 'storage' . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR; // logs storage
LogHandler::$name = 'telemonlog'; // log name
LogHandler::$log  = 'single'; // daily or single
LogHandler::$env  = 'production'; // environment

LogHandler::event(function(?string $environment, ?string $level, ?string $message, ?array $array) {
  echo $message;
});

Log::info('Hello World!', ['name' => 'Donald', 'age' => 21]);
```