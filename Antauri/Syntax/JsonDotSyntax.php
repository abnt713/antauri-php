<?php

namespace Antauri\Syntax;

class FileDotPropSyntax implements ISyntax{

    public function parseToRetrievable($configIdentifier, $workingDir){
        $shards = explode('.', $configIdentifier);
        $retrievable = \Antauri\Retriever\Retrievable();
        foreach($shards as $shard){
            $this->checkShardRole($shard, $retrievable, $workingDir);
        }

        if(!empty($shards)){
            $path = implode('/', $shards);
        }else{
            $path = '';
        }

        return $retrievable;
    }

    private function checkShardRole($shard, &$retrievable, $workingDir){
        if(is_dir("{$workingDir}/{$shard}")){
            $path = $retrievable->getPath();
            $retrievable->setPath("{$path}/$shard");
        }
    }

}
