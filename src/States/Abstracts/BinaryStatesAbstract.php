<?php

namespace BPI\States\Abstracts;

use \BPI\States\StatesInterface;
use Exception;

abstract class BinaryStatesAbstract implements StatesInterface {

    protected $isFinal = null;
    protected $executed = false;
    protected $finalState = null;
    protected $outputValue = null;
    protected $input;


    public function run($input){
        $this->input = $input;
        $this->executed = true;
        if(!$this->isInputValid($this->input))
            throw new \InvalidArgumentException($this->input.' is not valid binary value');
        return '';
    }
    

    public function isFinal(){
        return $this->isFinal;
    }

    public function returnNextState(){
        if($this->executed)
            return $this->finalState;
        throw new Exception('the run() method is not called yet');   
    }

    public function isInputValid($input)
    {
        if(in_array($input, ['0','1']))
            return true;
        return false;
    }
    public function getOutputValue(){
        return $this->outputValue;
    }
}