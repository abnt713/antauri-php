<?php

namespace Antauri\Storage;

interface IStorage{

    public function read($index);
    public function write($index, $data);

}
