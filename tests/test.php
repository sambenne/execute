<?php
    error_reporting( E_ALL );
    require_once __DIR__ . '/../vendor/autoload.php';

    use SamBenne\Execute\Timer;

    $timer = Timer::getInstance();
    $timer->start('test');

    sleep(3);

    echo $timer->output('test');
