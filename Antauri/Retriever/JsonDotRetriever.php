<?php

namespace Antauri\Retriever;

class JsonDotRetriever implements IRetriever{

    public function retrieveData(Retrievable $retrievable){
        $jsonFilePath = $retrievable->path . '/' . $retrievable->file . '.json';
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

        $prop = $retrievable->prop;
        $propShards = explode('.', $prop);

        $data = $jsonContent;
        foreach($propShards as $shard){
            if(isset($data[$shard])){
                $data = $data[$shard];
            }else{
                return new \Antauri\Storage\UndefinedValue();
            }
        }

        return $data;
    }

}
