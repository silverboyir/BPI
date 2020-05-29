<?php

use BPI\Machine;
use BPI\States\Models\St0;
use BPI\States\States;

require_once 'vendor/autoload.php';

if (PHP_SAPI !== 'cli')
{
   throw new Exception('Please run this file from Console!');
}

$writer = \BPI\Outputs\Output::factory('\BPI\Outputs\Adapters\Console');


$consoleWriter = $writer->getConsole();
$answer = $consoleWriter->ask('Please Enter The Input');

$machine = new Machine($answer,States::factory(St0::$name), $writer);
$writer->outputMessage($machine->run().'');

// TODO show memory usage and time