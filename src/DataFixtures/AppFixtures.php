<?php

namespace App\DataFixtures;

use App\Entity\Pilote;
use App\Entity\Qualification;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $qualification = new Qualification();
        $qualification->setCode('COM');
        $qualification->setLibelle('Commandant de bord');
        $manager->persist($qualification);


        $pilote = new Pilote();
        $pilote->setNom('Baudon');
        $pilote->setPrenom('Thomas');
        $pilote->setEmail('thomas@thomasbaudon.fr');
        $pilote->setPilote($qualification);
        $manager->persist($pilote);


        $manager->flush();
    }
}