<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Trip extends Fixture
{
    public const TRIP = [
        ['description' => 'Cacao',
        'country_name' => 'Madagascar',  
        ],
        ['description' => 'Cigarre',
        'country_name' => 'Cuba',
        ],
        ['description' => 'Vin',
        'country_name' => 'France',
        ],
        ['description' => 'Chapeau',
        'country_name' => 'Mexique',
        ],
        ['description' => 'Fromage',
        'country_name' => 'France',
        ],
        ['description' => 'Sangria',
        'country_name' => 'Espagne',
        ],
        ['description' => 'Datte',
        'country_name' => 'Maroc', 
        ],
        ['description' => 'Fromage',
        'country_name' => 'Italie',
        ],
        ['description' => 'Une mini Tour-Eiffel',
        'country_name' => 'France',
        ],

    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::TRIP as $tripName){
            $trip = new Desire();
            $trip->setDescription($tripName['description']);
            $trip->setCountry_name($tripName ['country_name']);
            $manager->persist($trip);
            $manager->flush(); 
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
