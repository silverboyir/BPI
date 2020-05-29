<?php 

namespace BPI\Outputs;

interface OutputInterface {
    /**
     *
     * @param String $message
     */
    public function outputMessage(String $message);
    
    /**
     *
     * @param String $message
     */
    public function outputErrorMessage(String $message);
}