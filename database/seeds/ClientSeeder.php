<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles

        Client::firstorCreate(['name' => 'MUKUNZI', 'email' => 'desiremukunzi@gmail.com','password' => bcrypt("12345678"),'client_type_id'=>1 ]);
        Client::firstorCreate(['name' => 'MURARA', 'email' => 'murara@gmail.com','password' => bcrypt("12345678"),'client_type_id'=>2 ]);
        Client::firstorCreate(['name' => 'MWIZA', 'email' => 'mwiza@gmail.com','password' => bcrypt("12345678"),'client_type_id'=>1 ]);
       

    }
}
