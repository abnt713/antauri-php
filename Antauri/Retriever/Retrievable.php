<?php

namespace Antauri\Retriever;

class Retrievable{

    public $path;
    public $file;
    public $prop;
    public $params;

    public function __construct($path, $file, $prop, $params = array()){
        $this->path = $path;
        $this->file = $file;
        $this->prop = $prop;
        $this->params = $params;
    }

}
