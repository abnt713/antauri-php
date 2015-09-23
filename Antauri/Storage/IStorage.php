<?php

namespace Antauri\Data;

interface IStorage{

    public function read($index);
    public function write($index, $data);

}
