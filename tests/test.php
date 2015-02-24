<?php
    require_once __DIR__ . '/../vendor/autoload.php';

    use Execute\Timer;

    Timer::start('test');

    sleep(3);

    echo Timer::output('test');
