<?php

namespace Antauri\Retriever;

class JsonRetriever implements IRetriever{

    public function retrieveData(Retrievable $retrievable, $antauriDir){
        $jsonFilePath = $antauriDir . '/' . $retrievable->path . '/' . $retrievable->file . '.json';
        if(is_file($jsonFilePath) && is_readable($jsonFilePath)){
            $validJsonFile = true;
        }else{
            $validJsonFile = false;
        }

        if(!$validJsonFile){
            throw new \Antauri\Exception\UnretrievableFileException();
            return null;
        }

        $jsonContent = file_get_contents($jsonFilePath);
        return json_decode($jsonContent, true);
    }

}
