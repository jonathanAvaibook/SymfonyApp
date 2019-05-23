<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class Usuario extends Fixture
{
    public function load(ObjectManager $manager)
    {


        $usuario = new Usuario();
        $manager->persist($usuario);

        $manager->flush();
    }
}
