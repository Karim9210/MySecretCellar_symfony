<?php

namespace App\DataFixtures;

use App\Entity\Region;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RegionFixtures extends Fixture
{
    public const PREFIX = 'region_';
    public const REGIONS =
        [
        "champagne",
        "bourgogne",
        "alsace",
        "beaujolais",
        "savoie",
        "vallée du rhône",
        "provence",
        "corse",
        "languedoc roussillon",
        "sud-ouest",
        "bordelais",
        "vallée de la loire",
        "jura"
        ];



    public function load(ObjectManager $manager): void
    {
        foreach (self::REGIONS as $regionLabel) {
            //instanciation d'un nouvel objet Type
            $region = new Region();
            //la définition du label du nouveau type
            $region->setLabelRegion($regionLabel);
            //la persistance en base de données
            $manager->persist($region);
            //référence pour chaque catégorie
            $this->addReference(self::PREFIX . $regionLabel, $region);
        }
        $manager->flush();
    }
}
