<?php

interface iAnimal {
	public static function respirar();
}


abstract class Animal implements iAnimal{ 
  function greeting() { 
    $sound = $this->sound();      // exists in child class by contract 
    return strtoupper($sound); 
  } 
  abstract function sound();      // this is the contract 
  abstract static function respirar();
} 
 
class Dog extends Animal { 
  function sound() {              // concrete implementation is mandatory 
    return "Woof!"; 
  } 

  static function respirar(){ echo 'respirando';}
} 

class Cat extends Animal {
  function sound() {              // concrete implementation is mandatory 
    return "miauuuu!"; 
  } 

  static function respirar(){ echo 'respirando';}
}

class Config {
  private $animalType;

  function __construct(){
    $this->animalType='Cat';
  }

  public function getAnimalType(){
    return $this->animalType;
  }
}


class Maker {
  static function Make($config){
    $ClasseAnimal = $config->getAnimalType();
    $animal = new $ClasseAnimal();
    return $animal;
  }
}
 
$dog = new Dog(); 
echo $dog->greeting();            // WOOF! 
//$dog->respirar();
Dog::respirar();

echo "\n";

$conf = new Config();
$ani = Maker::Make($conf);
echo $ani->sound();

?>