<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public const PREFIX = "user_";
    public const USER = [
        [
            "pseudo" => "admin",
            "email" => "admin@admin.fr",
            "password" => "admin",
            "avatar" => "",
            "role" => ["ROLE_ADMIN"]
        ],
        [
            "pseudo" => "user",
            "email" => "user@user.fr",
            "password" => "Fraise2090",
            "avatar" => "",
            "role" => ["ROLE_USER"]
        ],
        [
            "pseudo" => "lalalou",
            "email" => "lalou@lala.fr",
            "password" => "Fraise2090",
            "avatar" => "",
            "role" => ["ROLE_USER"]
        ],
        [
            "pseudo" => "jeanne",
            "email" => "lala@lala.fr",
            "password" => "Fraise2090",
            "avatar" => "",
            "role" => ["ROLE_USER"]
        ],
        [
            "pseudo" => "jeanne",
            "email" => "jeanne@jeanne.fr",
            "password" => "password",
            "avatar" => "",
            "role" => ["ROLE_USER"]
        ],
        [
            "pseudo" => "laura",
            "email" => "patoche@patoche.fr",
            "password" => "Fraise2090",
            "avatar" => "",
            "role" => ["ROLE_USER"]
        ],
        [
            "pseudo" => "michel",
            "email" => "michel@michel.fr",
            "password" => "password",
            "avatar" => "",
            "role" => ["ROLE_USER"]
        ]
    ];



    public function load(ObjectManager $manager): void
    {
        foreach (self::USER as $key => $userIndex) {
            $user = new User();
            $user
            ->setPseudo($userIndex['pseudo'])
            ->setEmail($userIndex['email'])
            ->setPassword($userIndex['password'])
            ->setAvatar($userIndex['avatar'])
            ->setRoles($userIndex["role"]);
            $manager->persist($user);
            $this->addReference(self::PREFIX . ($key + 1), $user);

            $manager->flush();
        }
    }
}
