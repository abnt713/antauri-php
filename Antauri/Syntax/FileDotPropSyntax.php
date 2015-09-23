<?php

namespace Antauri\Syntax;

class FileDotPropSyntax implements ISyntax{

    public function parseToRetrievable($configIdentifier){
        $shards = explode('.', $configIdentifier);
        $prop = array_pop($shards);
        $file = array_pop($shards);

        if(!empty($shards)){
            $path = implode('/', $shards);
        }else{
            $path = '';
        }

        return new \Antauri\Retriever\Retrievable($path, $file, $prop);
    }

}
