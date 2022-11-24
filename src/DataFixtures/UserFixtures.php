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
            "role" => ["admin"]
        ],
        [
            "pseudo" => "user",
            "email" => "user@user.fr",
            "password" => "Fraise2090",
            "avatar" => "",
            "role" => ["user"]
        ],
        [
            "pseudo" => "lalalou",
            "email" => "lalou@lala.fr",
            "password" => "Fraise2090",
            "avatar" => "",
            "role" => ["user"]
        ],
        [
            "pseudo" => "jeanne",
            "email" => "lala@lala.fr",
            "password" => "Fraise2090",
            "avatar" => "",
            "role" => ["user"]
        ],
        [
            "pseudo" => "jeanne",
            "email" => "jeanne@jeanne.fr",
            "password" => "password",
            "avatar" => "",
            "role" => ["user"]
        ],
        [
            "pseudo" => "laura",
            "email" => "patoche@patoche.fr",
            "password" => "Fraise2090",
            "avatar" => "",
            "role" => ["user"]
        ],
        [
            "pseudo" => "michel",
            "email" => "michel@michel.fr",
            "password" => "password",
            "avatar" => "",
            "role" => ["user"]
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
