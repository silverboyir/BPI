<?php
namespace BPI;

use BPI\Outputs\OutputInterface;
use BPI\States\StatesInterface;
use BPI\States\States;
use Exception;

class Machine {
    private $input;
    private $initialState;
    private $outputWriter;
    private $currentState;
    private $errorMessage = '';
    public function __construct($input = '', StatesInterface $initialState, OutputInterface $outputWriter)
    {
        $this->input = trim($input);
        $this->initialState = $initialState;
        $this->currentState = $initialState;
        $this->outputWriter = $outputWriter;
    }
    public function run()
    {
        if(!$this->isInputValid()){
            $this->outputWriter->outputErrorMessage($this->errorMessage);
            return false;
        }
        if(!empty($this->input)){
            foreach(str_split($this->input) as $input){
                try {
                    $this->currentState->run($input);
                    $this->currentState = States::factory($this->currentState->returnNextState());
                    
                }
                catch(Exception $e){
                    $this->outputWriter->outputErrorMessage($e->getMessage());
                    return false;
                }
            }
        }
       
        
    
        if($this->currentState->isFinal())
            return $this->currentState->getOutputValue();
        $this->outputWriter->outputErrorMessage('Invalid Input');
        return false;
    }
    private function isInputValid(){
        // if input is empty but our initial state is final then there it's OK!
        if(strlen($this->input) === 0){
            if(!$this->initialState->isFinal()){
                $this->errorMessage = 'Input can not be empty';
                return false;
            }
        }
        return true;
    }

}