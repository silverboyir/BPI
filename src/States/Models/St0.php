<?php 
namespace BPI\States\Models;

use BPI\States\Abstracts\BinaryStatesAbstract;

class St0 extends BinaryStatesAbstract{
    public static $name = __NAMESPACE__.'\St0';
    protected $isFinal = true;
    protected $outputValue = 0;
    public function run($input){
        parent::run($input);
        
        if($this->input == 0){
            $this->finalState = self::$name;
        }
        else 
            $this->finalState = St1::$name;
        return $this->returnNextState();
    }
}