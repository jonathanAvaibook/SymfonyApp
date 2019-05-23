<?php


namespace App\Helpers;


class Aviso
{
    private $texto;
    public function __construct($texto)
   {
      $this->texto = $texto;
   }

    public function notifyIncidence(String $texto)
    {
        if(strpos($texto, $this->texto) == false )
            return false;
        else
            return true;
    }
}