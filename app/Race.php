<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    private static $races = ['African' => ['Berber', 'Berber Tuareg', 'Black African', 'Eritrian', 'Ethiopian', 'Fulani', 'North African', 'Nubian', 
                                           'Somalian', 'Other African',],

                             'Arab' => ['Iraqi Arab', 'Iranian Arab', 'North African Arab','Saudi Arab', 'Syrian, Jordanian or Palestinian Arab', 

                                        'Yemeni Arab',  'Other Arab'],

                             'Asian' => ['Chinese','Bangladeshi', 'Indian', 'Indonesian', 'Japanese', 'Korean', 'Malaysian','Pakistani', 'Philipino', 
                                         'Sri Lankan', 'Other Asian'],

                             'Carribean' => ['Black Caribbean', 'Asian Caribbean', 'Other Caribbean'],

                             'Mixed' => ['Arab and Asian', 'Arab and Black', , 'Arab and White', 'Asian and White', 'Black and Asian', 'Black and White', 
                                         'Other Mixed'],

                             'White' => ['Albanian', 'American', 'Armenian', 'Danish', 'Dutch', 'English or British', 'European', 'French', 'Greek', 
                                         'German', 'Irish', 'Italian', 'Jewish', 'Kosovan', 'Polish', 'Portuguese', 'Ukranian', 'Romanian', 'Russian', 
                                         'Scottish', 'Spanish', 'Swedish', 'Swiss', 'Other White',  ], 

                             'Latin' => [''] 
                             


                            ]
}
