<?php

namespace Typhp\Array;

use Typhp\Exceptions\TyphpArrayException;
use Typhp\Exceptions\InvalidTypeExeption;

class Slide {

    private array $slide;
    private ?string $allowedType;

    public function __construct(array $slide, ?string $allowedType = null) {
        sort($slide);
        if (array_keys($slide) !== range(0, count($slide) - 1)) {
            throw new TyphpArrayException("Slide can only process numeric arrays");
        }
        $this->slide = $slide;
        $this->allowedType = $allowedType;
        foreach ($slide as $value) {
            $this->validateType($value);
        }
    }
    

    public function add($value): void {
        $this->validateType($value);
        $this->slide[] = $value;
    }



    /* 
        En realidad esto me gustaria que pudiera retornar un mixed
        o que pudiera retornar el tipo de dato que tiene $this->allowedType;
    */
    public function get(int $index) {
        $value = $this->slide[$index];
        $this->validateType($value);
        return $value;
    }
    

    public function map(callable $callback) : Slide{
        return new Slide(
            array_map($callback, $this->slide),
            $this->allowedType);
    }

    public function filter(callable $callback): Slide {
        $filteredData = array_filter($this->slide, $callback); 
        return new Slide($filteredData, $this->allowedType);
    }

    public function forEach(callable $callback) : void{
        foreach($this->slide as $value){
            $callback($value);
        }
    }


    public function find(callable $callback) {
        foreach ($this->slide as $element) {
            if ($callback($element)) {
                return $element;
            }
        }
        return null; 
    }
    

    public function some(callable $callback): bool {
        foreach ($this->slide as $element) {
            if ($callback($element)) {
                return true; 
            }
        }
        return false;
    }


    public function concat(Slide $data): Slide {
        $concatenatedData = array_merge($this->slide, $data->toArray());
        return new Slide($concatenatedData, $this->allowedType);
    }
    
    
    public function includes(mixed $key): bool {
        return in_array($key, $this->slide);
    }

    public function join(string $delimiter = ""): Stringify {
        return new Stringify(implode($delimiter, $this->slide));
    }
    
    
    

    private function validateType(mixed $value){
        if ($this->allowedType !== null && !($value instanceof $this->allowedType)) {
            throw new InvalidTypeExeption("Invalid type");
        }
    }


    public function sort(){
        sort($this->slide);
    }

    public function toArray(): array {
        return $this->slide;
    }
    
}
