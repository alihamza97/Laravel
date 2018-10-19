<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class wiki_cars extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,5) as $index) {
            DB::table('wiki_cars')->insert([

                'carTitle' => $faker->name,
                'description' => $faker->paragraph,
                'userId' => '0'
            ]);
        }
        //
//    factory(App\WikiCars::class,2)->create();
//
//        DB::table('wiki_Cars')->insert([
//            [
//                'carTitle' => 'Range Rover',
//                'description' => 'The Land Rover Range Rover (generally known simply as a Range Rover) is a full-sized
//                luxury sport utility vehicle (SUV) from Land Rover, a marque of Jaguar Land Rover.
//                 The Range Rover was launched in 1970 by British Leyland. This flagship model is now in its fourth generation. ',
////                'brand' => 'Land Rover',
////                'color' => 'Black',
//                'year' => '2000'
//            ],
//            [
//                'carTitle' => 'Jaguar',
//                'description' => 'Jaguar is the luxury vehicle brand of Jaguar Land Rover, a British multinational car manufacturer with
//                its headquarters in Whitley, Coventry, England and owned by the Indian company Tata Motors since 2008. ',
////                'brand' => 'sports',
////                'color' => 'Black',
//                'year' => '2000'
//            ],

//            ]);
       // $faker = Faker::create();
    }
}
