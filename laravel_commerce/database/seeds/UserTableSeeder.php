<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
//use Faker\Factory as Faker;

class UserTableSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        DB::table('users')->delete();//truncate();

        factory('CodeCommerce\User')->create([
            'name' => 'Marlon',
            'email' => 'marlonmacf@gmail.com',
            'password' => Hash::make(123456)
        ]);

        factory('CodeCommerce\User', 10)->create();

        /*
        $faker = Faker::create();

        User::create([
            'name' => 'Marlon',
            'email' => 'marlonmacf@gmail.com',
            'password' => Hash::make(123456)
        ]);

        foreach(range(1,10) as $i) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make($faker->word())
            ]);
        }
        */
    }
}