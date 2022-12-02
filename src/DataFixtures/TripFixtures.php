<?php

namespace App\DataFixtures;

use App\Entity\Trip;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TripFixtures extends Fixture
{
    public const TRIP = [
        ['description' => 'Description voyage 1',
        'country_name' => 'Madagascar',  
        ],
        ['description' => 'Description voyage 2',
        'country_name' => 'Cuba',
        ],
        ['description' => 'Description voyage 3',
        'country_name' => 'France',
        ],
        ['description' => 'Description voyage 4',
        'country_name' => 'Mexique',
        ],
        ['description' => 'Description voyage 5',
        'country_name' => 'France',
        ],
        ['description' => 'Description voyage 6',
        'country_name' => 'Espagne',
        ],
        ['description' => 'Description voyage 7',
        'country_name' => 'Espagne', 
        ],
        ['description' => 'Description voyage 8',
        'country_name' => 'Italie',
        ],
        ['description' => 'Description voyage 9',
        'country_name' => 'France',
        ],

    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::TRIP as $tripName){
            $trip = new Trip();
            $trip->setDescription($tripName['description']);
            $trip->setCountryName($tripName ['country_name']);
            $manager->persist($trip);
            $manager->flush(); 
        }
        
        $manager->flush();
    }
}
