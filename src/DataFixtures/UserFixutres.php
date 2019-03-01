<?php

namespace App\DataFixtures;

use App\Entity\User\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixutres extends Fixture
{
    /**
     * @var UserPasswordEncoder
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername("giny21");
        $user->setRoles(["ROLE_USER", "ROLE_ADMIN"]);
        
        $encodedPassword = $this->passwordEncoder->encodePassword($user, 'regor3600');
        $user->setPassword($encodedPassword);
        
        $manager->persist($user);
        $manager->flush();
    }
}
