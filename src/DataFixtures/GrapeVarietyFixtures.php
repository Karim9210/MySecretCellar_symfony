<?php

namespace App\DataFixtures;

use App\Entity\GrapeVariety;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GrapeVarietyFixtures extends Fixture
{
    public const PREFIX = 'grapeVariety_';
    public const GRAPEVARIETY =
    [
        "cabernet-franc noir",
        "cabernet-sauvignon noir",
        "carignan noir",
        "chardonnay blanc",
        "chenin blanc",
        "gamay noir",
        "gewurztraminer noir",
        "gewurztraminer blanc",
        "gewurztraminer rosé",
        "grenache noir",
        "merlot noir",
        "muscat blanc",
        "muscat noir",
        "pinot noir",
        "riesling blanc",
        "sauvignon blanc",
        "syrah noir",
        "ugni blanc",
        "viognier blanc",
        "pinot blanc"
    ];


    public function load(ObjectManager $manager): void
    {
        foreach (self::GRAPEVARIETY as $grapeVarietyLabel) {
            $grapeVariety = new GrapeVariety();
            $grapeVariety->setLabelGrapeVariety($grapeVarietyLabel);
            $manager->persist($grapeVariety);
            $this->addReference(self::PREFIX . $grapeVarietyLabel, $grapeVariety);

            $manager->flush();
        }
    }
}
