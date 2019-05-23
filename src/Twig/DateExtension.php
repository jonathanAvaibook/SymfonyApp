<?php


namespace App\Twig;


use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class DateExtension extends AbstractExtension
{
    public function getFilters()
    {
        return[
            new TwigFilter('europeDate', [DateRuntime::class, 'europeDate']),
            new TwigFilter('americaDate', [DateRuntime::class, 'americanDate'])
            ];
    }
/*
    public function europeDate($origDate)
    {
        return $origDate->format('d-m-Y');
    }

    public function americanDate($origDate)
    {
        return $origDate->format('Y-m-d');
    }
*/
}