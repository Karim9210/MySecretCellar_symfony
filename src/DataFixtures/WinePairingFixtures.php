<?php

namespace App\DataFixtures;

use App\Entity\WinePairing;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WinePairingFixtures extends Fixture
{
    public const PREFIX = 'winePairing_';

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
            $winePairing->setLabelWinePairing($winePairingLabel);
            $manager->persist($winePairing);
            $this->addReference(self::PREFIX . $winePairingLabel, $winePairing);
        }
        $manager->flush();
    }
}
