<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Desire extends Fixture
{
    public const DESIRE = [
        ['name' => 'Un katana',
        'budget' => '21',
        'country_name' => 'Japon',  
        ],
        ['name' => 'Kimono',
        'budget' => '86',
        'country_name' => 'Japon',
        ],
        ['name' => 'Fromage',
        'budget' => '92',
        'country_name' => 'Italie',
        ],
        ['name' => 'Sangria',
        'budget' => '45',
        'country_name' => 'Espagne',
        ],
        ['name' => 'Fromage',
        'budget' => '63',
        'country_name' => 'France',
        ],
        ['name' => 'Vin',
        'budget' => '21',
        'country_name' => 'France',
        ],
        ['name' => 'Sombrero',
        'budget' => '51',
        'country_name' => 'Mexique', 
        ],
        ['name' => 'Cigarre',
        'budget' => '88',
        'country_name' => 'Cuba',
        ],
        ['name' => 'Cacao',
        'budget' => '23',
        'country_name' => 'Madagascar',
        ],
        ['name' => 'Vanille',
        'budget' => '2php bin/console doctrine:fixtures:load3',
        'country_name' => 'Madagascar',
        ],

    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::DESIRE as $desireName){
            $desire = new Desire();
            $desire->setName($desireName['name']);
            $desire->setBudget( $desireName['budget']);
            $desire->setCountry_name($desireName ['country_name']);
            $manager->persist($desire);
            $manager->flush(); 
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
