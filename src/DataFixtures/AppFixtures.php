<?php

namespace App\DataFixtures;

use App\Entity\UserMessages;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $userMessages1 = new UserMessages();
        $userMessages1->setName('Cicó Cicó');
        $userMessages1->setEmail('cico@gmail.com');
        $userMessages1->setMessage('Ez az első üzenet!');
        $manager->persist($userMessages1);


        $userMessages2 = new userMessages();
        $userMessages2->setName('Sajtkukac Tekergő');
        $userMessages2->setEmail('tekergo@gmail.com');
        $userMessages2->setMessage('Ez a második üzenet!');
        $manager->persist($userMessages2);

        $userMessages3 = new userMessages();
        $userMessages3->setName('Hyppo Hilda');
        $userMessages3->setEmail('hilda@gmail.com');
        $userMessages3->setMessage('Ez a harmadik üzenet!');
        $manager->persist($userMessages3);

        $manager->flush();
    }
}
