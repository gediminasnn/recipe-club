<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        for($i = 1; $i<=5;$i++)
        {
            $user = new User();
            $user->setUsername('User'.$i);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'password'.$i
            ));
            $user->setRoles(['ROLE_USER']);
            $manager->persist($user);

            $admin = new User();
            $admin->setUsername('adminas');
            $admin->setPassword($this->passwordEncoder->encodePassword(
                $admin,
                'adminas'
            ));
            $admin->setRoles(['ROLE_ADMIN']);
            $manager->persist($admin);

        }

        $manager->flush();
    }
}
