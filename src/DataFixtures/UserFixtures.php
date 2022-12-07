<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $encrypted = password_hash("defaultuser", PASSWORD_BCRYPT, $options);
        $user = new User();
        $user->setEmail('defaultuser@gmail.com');
        $user->setPassword($encrypted);
        $user->setCreatedAt(new \DateTime());
        $user->setRoles($roles);
        $user->setAvatar('assets\medias\user.png');
        $manager->persist($user);

        $manager->flush();
    }
}
