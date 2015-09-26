<?php

namespace Antauri;

class App{

    private static $instance;

    public static function instance(){
        if(is_null(self::$instance)){
            self::$instance = new App();
        }

        return self::$instance;
    }

    private $dir;
    private $syntax;
    private $retriever;
    private $storage;

    private function __construct(){
        $this->dir = 'conf';
        $this->syntax = new Syntax\FileDotPropSyntax();
        $this->retriever = new Retriever\JsonRetriever();
        $this->storage = new Storage\ArrayStorage();
    }

    public function get($configIndex, $defaultOnNotFound = null){
        $value = $this->storage->read($configIndex);
        if(!$this->isUndefinedValue($value)){
            return $value;
        }

        $retrievable = $this->syntax->parseToRetrievable($configIndex, $this->dir);
        $data = $this->retriever->retrieveData($retrievable);

        if(!$this->isUndefinedValue($data)){
            $this->storage->write($configIndex, $data);
            return $data;
        }else{
            return $defaultOnNotFound;
        }
    }

    public function set($configIndex, $value){
        $this->storage->write($configIndex, $value);
    }

    private function isUndefinedValue($value){
        return is_object($value) && is_a($value, '\\Antauri\\Storage\\UndefinedValue');
    }

    /**
     * Set the value of Dir
     *
     * @param mixed dir
     *
     * @return self
     */
    public function setDir($dir)
    {
        $this->dir = $dir;

        return $this;
    }

    /**
     * Set the value of Syntax
     *
     * @param mixed syntax
     *
     * @return self
     */
    public function setSyntax($syntax)
    {
        $this->syntax = $syntax;

        return $this;
    }

    /**
     * Set the value of Retriever
     *
     * @param mixed retriever
     *
     * @return self
     */
    public function setRetriever($retriever)
    {
        $this->retriever = $retriever;

        return $this;
    }

    /**
     * Set the value of Storage
     *
     * @param mixed storage
     *
     * @return self
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;

        return $this;
    }

}
