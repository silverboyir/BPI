<?php 
namespace BPI\States;

interface StatesInterface {

    /**
     * do the job and return next state name
     * @param String $input
     * @return String
     * @throws Exception when input is not valid
     */
    public function run($input);
    
    /**
     * show this state is final or not
     * @return Boolean
     */
    public function isFinal();

    /**
     * return name of the next state
     * @return String
     * @throws Exception when input is method run is not called yet
     */
    public function returnNextState();

    /**
     * check the input and return boolean
     * @param String $input
     * @return Boolean
     */
    public function isInputValid($input);

    /**
     * @return String
     */
    public function getOutputValue();

}