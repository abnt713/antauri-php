<?php

namespace Antauri\Syntax;

class JsonDotSyntax implements ISyntax{

    public function parseToRetrievable($configIdentifier, $workingDir){
        $shards = explode('.', $configIdentifier);
        $retrievable = new \Antauri\Retriever\Retrievable();
        $retrievable->path = $workingDir;
        $retrievable->prop = array();

        foreach($shards as $shard){
            $this->checkShardRole($shard, $retrievable, $workingDir);
        }

        $retrievable->prop = implode('.', $retrievable->prop);

        return $retrievable;
    }

    private function checkShardRole($shard, &$retrievable, $workingDir){

        if($retrievable->file != ''){
            $prop = $retrievable->prop;
            $retrievable->prop[] = $shard;
            return;
        }

        $path = $retrievable->path;
        if(is_dir("{$path}/{$shard}")){
            $path = $retrievable->path;
            $retrievable->path = "{$path}/{$shard}";
        }else if(is_file("{$path}/{$shard}.json")){
            $retrievable->file = "{$shard}.json";
        }
    }

}
