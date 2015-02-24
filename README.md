# Execute
This project is just a simple PHP Script Execution.

## Usage

```php
<?php

use SamBenne\Execute;

Execute::start('test');

$myTime = Execute::output('test');

// <b>Total Execution Time:</b> 0.4 Secs
