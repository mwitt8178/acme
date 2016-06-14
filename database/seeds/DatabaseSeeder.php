<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use App\Customer;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::unguard();
        User::truncate();

        User::create([
            'name' => 'Matthew Witt',
            'email' => 'mwitt8178@gmail.com',
            'position' => 'Engineer',
            'supervisor' => 'John Doe',
            'department' => 'IT',
            'birthday' => '1979-21-12',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Admin Guy',
            'email' => 'admin@acmesupportteam.com',
            'position' => 'Manager',
            'supervisor' => 'John Doe',
            'department' => 'Administration',
            'birthday' => '1999-11-08',
            'password' => Hash::make('password')
        ]);

        $faker = Faker::create();
        foreach (range(1,20) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'position' => $faker->text(15),
                'supervisor' => $faker->name,
                'department' => $faker->company,
                'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'password' => Hash::make('secret'),
                'created_at' => $faker->dateTime()
            ]);
        }

        User::reguard();

        Customer::unguard();
        Customer::truncate();


        $faker = Faker::create();
        foreach (range(1,20) as $index) {

            $lat = '';
            $lng = '';
            //  Initiate curl
            $ch = curl_init();
            // Disable SSL verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // Will return the response, if false it print the response
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // Set the url
            curl_setopt($ch, CURLOPT_URL,'http://maps.googleapis.com/maps/api/geocode/json?address='.$faker->randomNumber(5).'&sensor=false');
            // Execute
            $result=curl_exec($ch);
            // Closing
            curl_close($ch);

            $results = json_decode($result, true);

            if($results['status'] == 'OK'){
                $lat = $results['results'][0]['geometry']['location']['lat'];
                $lng = $results['results'][0]['geometry']['location']['lng'];
            }

            DB::table('customers')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'company' => $faker->company,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'address_1' => $faker->streetAddress,
                'address_2' => $faker->secondaryAddress,
                'city' => $faker->city,
                'state' => $faker->state,
                'zip' => $faker->randomNumber(5),
                'created_at' => $faker->dateTime(),
                'lat' => $lat,
                'lng' => $lng
            ]);
        }

        Customer::reguard();
    }
}
