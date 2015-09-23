<?php

namespace Antauri;

class Antauri{

    private static $dir;
    private static $syntax;
    private static $retriever;
    private static $storage;

    public static function dir($dir){
        App::instance()->dir($dir);
    }

    public static function syntax(Syntax\ISyntax $syntax){
        App::instance()->syntax($syntax);
    }

    public static function retriever(Retriever\IRetriever $retriever){
        App::instance()->retriever($retriever);
    }

    public static function storage(Storage\IStorage $storage){
        App::instance()->storage($storage);
    }

    public static function get($configIndex, $defaultOnNotFound = null){
        return App::instance()->get($configIndex, $defaultOnNotFound);
    }

    public static function set($configIndex, $value){
        App::instance()->set($configIndex, $value);
    }

}
