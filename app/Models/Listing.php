<?php 
    namespace App\Models;

    class Listing {
        public static function all () {
            return
            [
                [
                    'id' => 1,
                    'title' => 'Listing One',
                    'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis eveniet dicta at quidem quia. Eveniet dolore doloribus sequi officia assumenda adipisci incidunt aliquam, ducimus consequuntur velit facere sit id earum ipsam eligendi quasi quo perspiciatis, voluptatibus veritatis! Deserunt, quo dicta ut, consectetur sequi ipsa vero aut fugiat voluptatibus, rerum quaerat.'
                ],
                [
                    'id' => 2,
                    'title' => 'Listing Two',
                    'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis eveniet dicta at quidem quia. Eveniet dolore doloribus sequi officia assumenda adipisci incidunt aliquam, ducimus consequuntur velit facere sit id earum ipsam eligendi quasi quo perspiciatis, voluptatibus veritatis! Deserunt, quo dicta ut, consectetur sequi ipsa vero aut fugiat voluptatibus, rerum quaerat.'
                ]
            ];
        }

        public static function find($id) {
            $listings = self::all();

            foreach($listings as $listing) {
                if($listing['id'] == $id) return $listing;
            }
        }
    }

?>