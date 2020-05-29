<?php

namespace BPI\Outputs\Adapters;

use \BPI\Outputs\OutputInterface;

/**
 * Silence Output
 */

class NullOutput implements OutputInterface {
    public function outputMessage(String $message){
        
    }
    public function outputErrorMessage(string $errorMessage)
    {
    }
}