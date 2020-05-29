<?php

namespace BPI\Outputs\Adapters;

use \BPI\Outputs\OutputInterface;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Sending output to the console
 */

class Console implements OutputInterface {
    private static $consoleInstance = null;
    public static function getConsole(){
        if(self::$consoleInstance === null)
            self::$consoleInstance =  new SymfonyStyle(new StringInput(''),new ConsoleOutput()); 
        return self::$consoleInstance;
    }
    public function outputMessage(String $message){
        $this->getConsole()->writeln('<info>'.$message.'</info>');
    }
    public function outputErrorMessage(string $errorMessage)
    {
        $this->getConsole()->writeln('<error>'.$errorMessage.'</error>');
    }
}