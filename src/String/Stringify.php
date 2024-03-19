<?php

namespace Typhp\String;
use Typhp\Array\Slide;


class Stringify {
    private string $string;

    public function __construct(string $string) {
        $this->string = $string;
    }

    public function split(string $delimiter) : Slide {
        return new Slide(explode($delimiter, $this->string));
    }

    public function print(){
        print($this->string);
    }
}
