<?php

namespace Antauri\Storage;

class ArrayStorage implements IStorage{

    private $storage;

    public function __construct(){
        $this->storage = array();
    }

    public function read($index){
        return isset($this->storage[$index]) ? $this->storage[$index] : new UndefinedValue();
    }

    public function write($index, $data){
        $this->storage[$index] = $data;
    }

}
