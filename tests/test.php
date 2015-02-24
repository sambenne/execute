<?php
    require_once __DIR__ . '/../vendor/autoload.php';

    use Execute\Execute;

    Execute::start('test');

    sleep(3);

    echo Execute::output('test');