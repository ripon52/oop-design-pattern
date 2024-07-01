<?php

class AnimalFactory{

    public function getAnimal($type){
        switch($type){
            case 'cat':
                return new Cat();
            case 'dog':
                return new Dog();
        }
    }
}

class Cat{
    public function speak(){
        echo "Meow";
    }
}

class Dog{
    public function speak(){
        echo "Woof";
    }
}


// Factory Class Call
$animalFactory = new AnimalFactory();
$animal = $animalFactory->getAnimal('cat');
$animal->speak();
