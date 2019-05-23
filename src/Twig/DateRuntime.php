<?php


namespace App\Twig;


use Twig\Extension\RuntimeExtensionInterface;
use Twig\TwigFilter;

class DateRuntime implements RuntimeExtensionInterface{

    public function europeDate($origDate)
    {
        return $origDate->format('d-m-Y');
    }

    public function americanDate($origDate)
    {
        return $origDate->format('Y-m-d');
    }
}