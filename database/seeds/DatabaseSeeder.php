<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        for($i = 0; $i < 500; $i++){
            // DB::table('users')->insert([
            //     'name' => str_random(10),
            //     'email' => str_random(10).'@gmail.com',
            //     'phone' => mt_rand(100000, 999999),
            //     'dob' => '1990-10-10',
            //     'country' => str_random(10),
            //     'state' => str_random(10),
            //     'state' => str_random(6),
            //     'street' => str_random(12),
            //     'postcode' => str_random(6),
            //     'lastip' => '127.0.0.1',
            //     'role' => 0,
            //     'password' => bcrypt('secret'),
            // ]);

            DB::table('servers')->insert([
                'name' => str_random(8),
                'type_id' => 1,
                'host_id' => 1,
                'user_id' => mt_rand(1, 300),
                'max_players' => mt_rand(10, 99),
                'max_memory' => mt_rand(10, 99),
                'max_disk' => mt_rand(1, 6),
                'server_secret' => str_random(8),
                'ip' => '127.0.0.1',
                'status' => 'offline',
                'current_players' => 0, 
                'cpu_priority' => 0, 
                'started_at' => '2017-01-18 00:00:00', 
                'suspeneded' => false,
                'port' => mt_rand(1000, 9999),
            ]);
        }
    }
    
}
