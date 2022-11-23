<?php

namespace App\DataFixtures;

use App\Entity\Appellation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppellationFixtures extends Fixture
{
    public const PREFIX = 'appellation_';
    public const APPELLATION = [
        "margaux",
        "haut-médoc",
        "graves",
        "saint-estephe",
        "saint-émilion",
        "pauillac",
        "pomerol",
        "saint-julien",
        "bordeaux supérieur",
        "pessac-léognan",
        "blaye",
        "loupiac",
        "cadillac",
        "sauternes",
        "medoc",
        "gewurztraminer",
        "riesling",
        "pinot gris",
        "gruenspiel",
        "engelgarten",
        "morgon",
        "julienas",
        "moulin à vent",
        "brouilly",
        "chirouble",
        "aloxe-corton",
        "corton",
        "chorey-les-beaune",
        "saint-aubin",
        "savigny-les-beaune",
        "pommard",
        "chevrey-chambertin",
        "marsannay",
        "côtes de nuit",
        "irancy",
        "coulanges-la-vinneuse",
        "puilly-fuissée",
        "chablis",
        "mercurey",
        "vosne-romanée",
        "voirin-jumel",
        "canard duchene",
        "hutasse et fils",
        "ayala",
        "le brun serveney",
        "château neuf du pape",
        "crozes hermitage",
        "côte du rhône chusclan",
        "condrieu",
        "arbois",
        "côtes du jura",
        "château-chalon ",
        "collioure",
        "pic saint loup",
        "fitoux",
        "cabardes",
        "côteaux du languedoc",
        "rivesaltes",
        "côtes du roussillon villages",
        "languedoc",
        "bandol",
        "cahors",
        "madiran",
        "jurançon",
        "chinon",
        "sancerre",
        "la roulerie"
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::APPELLATION as $appellationLabel) {
            $appellation = new Appellation();
            $appellation->setLabelAppellation($appellationLabel);
            $manager->persist($appellation);
            $this->addReference(self::PREFIX . $appellationLabel, $appellation);
        }

        $manager->flush();
    }
}
