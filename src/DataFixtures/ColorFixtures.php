<?php

namespace App\DataFixtures;

use App\Entity\Color;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ColorFixtures extends Fixture
{
    public const PREFIX = "color_";
    public const COLORS = [
        'rouge',
        'blanc',
        'rosé',
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::COLORS as $colorsLabel) {
            $color = new Color();
            $color->setLabelColor($colorsLabel);
            $manager->persist($color);
            $this->addReference(self::PREFIX . $colorsLabel, $color);
        }
        $manager->flush();
    }
}
