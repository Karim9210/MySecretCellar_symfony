<?php

namespace App\DataFixtures;

use App\Entity\WinePairing;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WinePairingFixtures extends Fixture
{
    public const WINEPAIRING = [
        "charcuterie",
        "viande rouge",
        "viande blanche",
        "gibier",
        "poisson",
        "fromage",
        "chocolat",
        "dessert fruité"
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::WINEPAIRING as $winePairingLabel) {
            $winePairing = new WinePairing();
            $winePairing->setLabel($winePairingLabel);
            $manager->persist($winePairing);
            $this->addReference('winePairing_' . $winePairingLabel, $winePairing);
        }
        $manager->flush();
    }
}
