<?php


namespace App\Factory;


use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFactory
{
    private UserPasswordEncoderInterface $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function create($email, $plainPassword)
    {
        $user = new User();
        $user->setEmail($email);
        $password = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($password);

        return $user;
    }
}