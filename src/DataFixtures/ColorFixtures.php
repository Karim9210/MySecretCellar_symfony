<?php

namespace App\DataFixtures;

use App\Entity\Color;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ColorFixtures extends Fixture
{
    public const COLORS = [
        'Rouge',
        'Blanc',
        'Rosé',
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::COLORS as $colorsLabel) {
            $color = new Color();
            $color->setLabel($colorsLabel);
            $manager->persist($color);
            $this->addReference('color_' . $colorsLabel, $color);
        }
        $manager->flush();
    }
}
