<?php 
namespace BPI\States\Models;

use BPI\States\Abstracts\BinaryStatesAbstract;

class St1 extends BinaryStatesAbstract{
    public static $name = __NAMESPACE__.'\St1';
    protected $isFinal = true;
    protected $outputValue = 1;
    public function run($input){
        parent::run($input);
        if($this->input == 0){
            $this->finalState = St2::$name;
        }
        else 
            $this->finalState = St0::$name;
        return $this->returnNextState();
    }
}