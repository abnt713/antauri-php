<?php

namespace Antauri\Retriever;

class JsonDotRetriever implements IRetriever{

    public function retrieveData(Retrievable $retrievable){
        $jsonFilePath = $retrievable->path . '/' . $retrievable->file;
        if(is_file($jsonFilePath) && is_readable($jsonFilePath)){
            $validJsonFile = true;
        }else{
            $validJsonFile = false;
        }

        if(!$validJsonFile){
            throw new \Antauri\Exception\UnretrievableFileException($retrievable->file);
            return null;
        }

        $jsonStringContent = file_get_contents($jsonFilePath);
        $jsonContent = json_decode($jsonStringContent, true);

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
