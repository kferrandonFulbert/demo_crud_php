<?php

class Toto{
    private $toto;
    public function __construct(){
        $this->toto="Bonjour";
    }
    public function getToto(){
        return $this->toto;
    }
}
class Test{
    private static $_instance = null;
    private $toto;
    private function __construct(){
        $this->toto = new Toto();
    }
    
    public static function getInstance(){
        if(self::$_instance==null){
            self::$_instance = new Test();
        }
        return self::$_instance;
    }
    public function getToto(){
        return $this->toto;
    }
    public function affToto(){
        echo $this->getToto()->getToto();
    }
}
 
$test = Test::getInstance()->affToto();


        
