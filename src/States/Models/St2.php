<?php 
namespace BPI\States\Models;

use BPI\States\Abstracts\BinaryStatesAbstract;

class St2 extends BinaryStatesAbstract{
    public static $name = __NAMESPACE__.'\St2';
    protected $isFinal = true;
    protected $outputValue = 2;
    public function run($input){
        parent::run($input);
        if($this->input == 0){
            $this->finalState = St1::$name;
        }
        else 
            $this->finalState = self::$name;
        return $this->returnNextState();
    }
}