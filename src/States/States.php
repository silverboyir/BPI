<?php
namespace BPI\States;

class States {
    public static function factory($name){
        return new $name();
    }
}