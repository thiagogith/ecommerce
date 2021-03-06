<?php

  namespace Hcode;

  class Model {

    private $value = [];

    public function __call($name, $args)
    {
      $method = substr($name, 0, 3);
      $fieldName = substr($name, 3, strlen($name));

      var_dump($method, $fieldName);

      switch ($method) {
        case "get":
          return $this->values[$fieldName];
        break;

        case "set":
          $this->values[$fieldName] = $args[0];
        break;
      }

    }

    public function setData($data = array())
    {
      foreach ($data as $key => $value) {
        //tudo quer for dinamico coloca entre chaves{}
        $this->{"set".$key}($value);//nome do metodo
      }
    }

    public function getValues()
    {
      return $this->values;
    }

  }

 ?>
