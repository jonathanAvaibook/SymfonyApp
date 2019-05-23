<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class PageController extends AbstractController {
    /**
     * @Route("/primera_pagina")
     */
    public function index(){
        $name = 'Johnny';
        return $this->render('page/index.html.twig',
            array(
                'name' => $name
            )
        );
    }

}