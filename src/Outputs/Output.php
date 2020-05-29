<?php 
namespace BPI\Outputs;

use Exception;

class Output {
    /**
     * @return OutputInterface
     */
    public static function factory($name){
        if(!class_exists($name))
            throw new Exception('Class Not Found');
        return new $name;
    } 
}