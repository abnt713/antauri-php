<?php

namespace Antauri;

class Antauri{

    private static $dir;
    private static $syntax;
    private static $retriever;
    private static $storage;

    public static function init($dir = ''){
        self::$dir = $dir;
        self::$syntax = new Syntax\FileDotPropSyntax();
        self::$retriever = new Retriever\JsonRetriever();
        self::$storage = new Storage\ArrayStorage();
    }

    public static function dir($dir){
        self::$dir = $dir;
    }

    public static function syntax(Syntax\ISyntax $syntax){
        self::$syntax = $syntax;
    }

    public static function retriever(Retriever\IRetriever $retriever){
        self::$retriever = $retriever;
    }

    public static function storage(Storage\IStorage $storage){
        self::$storage = $storage;
    }

    public static function get($configIndex, $defaultOnNull = null){
        
    }

}
