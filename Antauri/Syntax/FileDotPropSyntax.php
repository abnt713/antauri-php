<?php

namespace Antauri\Syntax;

class JsonDotSyntax implements ISyntax{

    public function parseToRetrievable($configIdentifier, $workingDir){
        $shards = explode('.', $configIdentifier);
        $retrievable = \Antauri\Retriever\Retrievable();
        $retrievable->path = $workingDir;
        foreach($shards as $shard){
            $this->checkShardRole($shard, $retrievable);
        }

        echo '<pre>';
        var_dump($retrievable);
        echo '</pre>';

        return $retrievable;
    }

    private function checkShardRole($shard, &$retrievable, $workingDir){

        if($retrievable->file != ''){
            $prop = $retrievable->prop;
            $retrievable->setProp("{$prop}.{$shard}");
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
