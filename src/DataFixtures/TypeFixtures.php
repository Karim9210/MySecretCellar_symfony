<?php

namespace App\DataFixtures;

use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public const PREFIX = 'type_';

    public const TYPES =
        [
            "sec",
            "moelleux",
            "liquoreux",
            "pétillant"
        ];


    public function load(ObjectManager $manager): void
    {
        foreach (self::TYPES as $typeLabel) {
            //instanciation d'un nouvel objet Type
            $type = new Type();
            //la définition du label du nouveau type
            $type->setLabelType($typeLabel);
            //la persistance en base de données
            $manager->persist($type);
            //référence pour chaque catégorie
            $this->addReference(self::PREFIX . $typeLabel, $type);
        }

        $manager->flush();
    }
}
