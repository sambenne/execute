# Execute
This project is just a simple PHP Script Execution.

## Usage

```php
<?php

use SamBenne\Execute\Timer;

$timer = Timer::getInstance(;
$timer->start('test');

$myTime = $timer->output('test');

// <b>Total Execution Time:</b> 0.4 Secs
