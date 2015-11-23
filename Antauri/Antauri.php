<?php

namespace Antauri;

class Antauri{

    private static $dir;
    private static $syntax;
    private static $retriever;
    private static $storage;

    public static function dir($dir){
        App::instance()->setDir($dir);
    }

    public static function syntax(Syntax\ISyntax $syntax){
        App::instance()->setSyntax($syntax);
    }

    public static function retriever(Retriever\IRetriever $retriever){
        App::instance()->setRetriever($retriever);
    }

    public static function storage(Storage\IStorage $storage){
        App::instance()->setStorage($storage);
    }

    public static function get($configIndex, $defaultOnNotFound = null){
        try{
            return App::instance()->get($configIndex, $defaultOnNotFound);
        }catch(\Exception $e){
            throw $e;
        }
    }

    public static function set($configIndex, $value){
        App::instance()->set($configIndex, $value);
    }

}
