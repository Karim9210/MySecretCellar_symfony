<?php

namespace App\DataFixtures;

use App\Entity\Wine;
use App\DataFixtures\AppellationFixtures;
use App\DataFixtures\ColorFixtures;
use App\DataFixtures\CountryFixtures;
use App\DataFixtures\GrapeVarietyFixtures;
use App\DataFixtures\RegionFixtures;
use App\DataFixtures\TypeFixtures;
use App\DataFixtures\UserFixtures;
use App\DataFixtures\WinePairingFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class WineFixtures extends Fixture implements DependentFixtureInterface
{
    public const PREFIX = "wine_";
    public const WINES = [
        [
          "domaine" => "château de sales",
          "description" => "There are many variations of passages 
          of Lorem Ipsum available, but the majority have suffered alteration in some 
          form, by injected humour, or randomised words 
          which don't look even slightly believable. ",
          "comment" => "Lorem Ipsum is therefore always free ",
          "rank" => 3.0,
          "price" => 7.5,
          "stock" => 6,
          "value" => 10.0,
          "cellarLocation" => "A-24",
          "picture" => "",
          "drinkBefore" => 2024,
          "vintage" => 2014,
          "purchaseDate" => null,
          "color" => "rouge",
          "country" => "France",
          "region" => "bordelais",
          "appellation" => "pomerol",
          "type" => "sec",
          "user" => 1,
          "grapeVariety" => "chardonnay blanc",
          "winePairing" => "chocolat"
        ],
        [
          "domaine" => "clos saint apollo",
          "description" => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. ",
          "comment" => "Lorem Ipsum is therefore always free ",
          "rank" => 3.0,
          "price" => 15.0,
          "stock" => 3,
          "value" => 20.0,
          "cellarLocation" => "B-10",
          "picture" => "",
          "drinkBefore" => 2030,
          "vintage" => 2015,
          "purchaseDate" => null,
          "color" => "blanc",
          "country" => "France",
          "region" => "alsace",
          "appellation" => "gewurztraminer",
          "type" => "sec",
          "user" => 1,
          "grapeVariety" => "gewurztraminer blanc",
          "winePairing" => "poisson"
        ],
        [
          "domaine" => "château giscours",
          "description" => "There are many variations of passages of 
          Lorem Ipsum available, but the majority have suffered alteration
           in some form, by injected humour, or randomised words which 
           don't look even slightly believable. ",
          "comment" => "Lorem Ipsum is therefore always free ",
          "rank" => 5.0,
          "price" => 13.0,
          "stock" => 12,
          "value" => 30.0,
          "cellarLocation" => "C-10",
          "picture" => "",
          "drinkBefore" => 2026,
          "vintage" => 2006,
          "purchaseDate" => null,
          "color" => "rouge",
          "country" => "France",
          "region" => "bordelais",
          "appellation" => "margaux",
          "type" => "sec",
          "user" => 1,
          "grapeVariety" => "merlot noir",
          "winePairing" => "charcuterie"
        ],
        [
          "domaine" => "château cantenac",
          "description" => "There are many variations of passages of
           Lorem Ipsum available, but the majority have suffered alteration
           in some form, by injected humour, or randomised words which don't
           look even slightly believable. ",
          "comment" => "Lorem Ipsum is therefore always free ",
          "rank" => 4.0,
          "price" => 4.3,
          "stock" => 2,
          "value" => 10.0,
          "cellarLocation" => "D-01",
          "picture" => "",
          "drinkBefore" => 2030,
          "vintage" => 2010,
          "purchaseDate" => null,
          "color" => "rouge",
          "country" => "France",
          "region" => "bordelais",
          "appellation" => "margaux",
          "type" => "sec",
          "user" => 1,
          "grapeVariety" => "pinot noir",
          "winePairing" => "viande blanche"
        ],
        [
          "domaine" => "château lagune",
          "description" => "There are many variations of passages of 
          Lorem Ipsum available, but the majority have suffered alteration
           in some form, by injected humour, or randomised words 
           which don't look even slightly believable. ",
          "comment" => "Lorem Ipsum is therefore always free ",
          "rank" => 5.0,
          "price" => 7.1,
          "stock" => 10,
          "value" => 12.0,
          "cellarLocation" => "D-02",
          "picture" => "",
          "drinkBefore" => 2025,
          "vintage" => 2012,
          "purchaseDate" => null,
          "color" => "rosé",
          "country" => "France",
          "region" => "bordelais",
          "appellation" => "haut-médoc",
          "type" => "sec",
          "user" => 1,
          "grapeVariety" => "syrah noir",
          "winePairing" => "fromage"
        ],
        [
          "domaine" => "château duhars",
          "description" => "There are many variations of passages 
          of Lorem Ipsum available, but the majority have suffered 
          alteration in some form, by injected humour, or randomised
          words which don't look even slightly believable. ",
          "comment" => "Lorem Ipsum is therefore always free ",
          "rank" => 5.0,
          "price" => 9.0,
          "stock" => 4,
          "value" => 15.0,
          "cellarLocation" => "D-03",
          "picture" => "",
          "drinkBefore" => 2035,
          "vintage" => 2019,
          "purchaseDate" => null,
          "color" => "rosé",
          "country" => "France",
          "region" => "bordelais",
          "appellation" => "pauillac",
          "type" => "sec",
          "user" => 1,
          "grapeVariety" => "pinot noir",
          "winePairing" => "viande rouge"
        ],
        [
          "domaine" => "Jean & Lys Dru",
          "description" => "Lorem Ipsum generators on the Internet 
          tend to repeat predefined chunks as necessary, making 
          this the first true generator on the Internet.",
          "comment" => "Lorem Ipsum generators on the Internet 
          tend to repeat predefined chunks as necessary.",
          "rank" => 5.0,
          "price" => 22.0,
          "stock" => 2,
          "value" => 30.0,
          "cellarLocation" => "D-04",
          "picture" => "",
          "drinkBefore" => 2022,
          "vintage" => 2000,
          "purchaseDate" => null,
          "color" => "blanc",
          "country" => "France",
          "region" => "bourgogne",
          "appellation" => "chablis",
          "type" => "sec",
          "user" => 1,
          "grapeVariety" => "cabernet-sauvignon noir",
          "winePairing" => "dessert fruité"
        ],
        [
          "domaine" => "Hansel Baerysis",
          "description" => "The point of using Lorem Ipsum is 
          that it has a more-or-less normal distribution of 
          letters, as opposed to using 'Content here, content 
          here', making it look like readable English. ",
          "comment" => "The point of using Lorem Ipsum is 
          that it has a more-or-less normal distribution of letters, as opposed to using.",
          "rank" => 4.0,
          "price" => 12.0,
          "stock" => 5,
          "value" => 12.0,
          "cellarLocation" => "A-05",
          "picture" => "",
          "drinkBefore" => 2020,
          "vintage" => 2015,
          "purchaseDate" => null,
          "color" => "blanc",
          "country" => "France",
          "region" => "alsace",
          "appellation" => "riesling",
          "type" => "sec",
          "user" => 1,
          "grapeVariety" => "carignan noir",
          "winePairing" => "chocolat"
        ],
        [
          "domaine" => "domaine Ducreux",
          "description" => "Letraset sheets containing Lorem 
          Ipsum passages, and more recently with desktop publishing 
          software like Aldus PageMaker including versions of Lorem Ipsum.",
          "comment" => "Letraset sheets containing Lorem Ipsum passages, 
          and more recently with desktop publishing software like Aldus.",
          "rank" => 0.0,
          "price" => 22.0,
          "stock" => 5,
          "value" => 32.0,
          "cellarLocation" => "K-10",
          "picture" => "",
          "drinkBefore" => 2022,
          "vintage" => 2002,
          "purchaseDate" => null,
          "color" => "rouge",
          "country" => "France",
          "region" => "bordelais",
          "appellation" => "margaux",
          "type" => "sec",
          "user" => 1,
          "grapeVariety" => "pinot noir",
          "winePairing" => "fromage"
        ],
        [
          "domaine" => "clos maraîcher",
          "description" => "Du volume et de la rondeur par la 
          roussanne, apportant fraîcheur et arômes délicats de 
          pêche de vigne et de poire. \u00c0 la dégustation, 
          l'attaque est franche et très bien équilibrée avec 
          cette belle fraîcheur très caractéristique des vins de la maison. ",
          "comment" => "J'AIME BEAUCOUP miam",
          "rank" => 5.0,
          "price" => 12.0,
          "stock" => 2,
          "value" => 12.0,
          "cellarLocation" => "B_C04",
          "picture" => "",
          "drinkBefore" => 2022,
          "vintage" => 2014,
          "purchaseDate" => null,
          "color" => "rosé",
          "country" => "France",
          "region" => "bourgogne",
          "appellation" => "arbois",
          "type" => "sec",
          "user" => 1,
          "grapeVariety" => "gamay noir",
          "winePairing" => "fromage"
        ],
        [
          "domaine" => "villa blanche",
          "description" => "Avec ses notes d'abricot, de pêche 
          de vigne et ses subtiles notes boisées grâce à un 
          élevage de 3 mois en f\u00fbt de chêne, ce vin blanc 
          u Languedoc-Roussillon se montre particulièrement 
          accessible et fédérateur dès l'apéritif.",
          "comment" => "Cépage chardonnay. Vin très léger.",
          "rank" => 5.0,
          "price" => 12.0,
          "stock" => 2,
          "value" => 12.0,
          "cellarLocation" => "A-10",
          "picture" => "",
          "drinkBefore" => 2015,
          "vintage" => 2012,
          "purchaseDate" => null,
          "color" => "rosé",
          "country" => "France",
          "region" => "sud-ouest",
          "appellation" => "rivesaltes",
          "type" => "sec",
          "user" => 1,
          "grapeVariety" => "grenache noir",
          "winePairing" => "gibier"
        ]

      ];

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        foreach (self::WINES as $key => $wineIndex) {
            $wine = new Wine();
            $wine->setDomaine($wineIndex['domaine']);
            $wine->setComment($wineIndex['comment']) ;
            $wine->setDescription($wineIndex['description']);
            $wine->setRanking($wineIndex['rank']);
            $wine->setPrice($wineIndex['price']);
            $wine->setStock($wineIndex['stock']);
            $wine->setValue($wineIndex['value']);
            $wine->setCellarLocation($wineIndex['cellarLocation']);
            $wine->setPicture($wineIndex['picture']);
            $wine->setDrinkBefore($wineIndex['drinkBefore']);
            $wine->setVintage($wineIndex['vintage']);
            $wine->setPurchaseDate($wineIndex['purchaseDate']);
            $wine->setColor($this->getReference(ColorFixtures::PREFIX . $wineIndex['color']));
            $wine->setCountry($this->getReference(CountryFixtures::PREFIX . $wineIndex['country']));
            $wine->setRegion($this->getReference(RegionFixtures::PREFIX . $wineIndex['region']));
            $wine->setAppellation($this->getReference(AppellationFixtures::PREFIX . $wineIndex['appellation']));
            $wine->setType($this->getReference(TypeFixtures::PREFIX . $wineIndex['type']));
            $wine->addUser($this->getReference(UserFixtures::PREFIX . $wineIndex['user']));
            $wine->addGrapeVariety($this->getReference(GrapeVarietyFixtures::PREFIX . $wineIndex['grapeVariety']));
            $wine->addWinePairing($this->getReference(WinePairingFixtures::PREFIX . $wineIndex['winePairing']));

            $manager->persist($wine);
            $this->addReference(self::PREFIX . $key, $wine);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            AppellationFixtures::class,
            ColorFixtures::class,
            CountryFixtures::class,
            GrapeVarietyFixtures::class,
            RegionFixtures::class,
            TypeFixtures::class,
            UserFixtures::class,
            WinePairingFixtures::class,
        ];
    }
}
