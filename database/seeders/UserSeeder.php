<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!self::isUserExist('shadowadmin@gmail.com'))
        {
            self::createUser('shadowadmin', 'shadowadmin@gmail.com', '$h@dow888');
        }

        if(!self::isUserExist('shadowapi@gmail.com'))
        {
            self::createUser('shadowapi', 'shadowapi@gmail.com', '$h@dow888');
        }

        if(!self::isUserExist('shadowlogs@gmail.com'))
        {
            self::createUser('shadowlogs', 'shadowlogs@gmail.com', '$h@dow888');
        }
    }


    private function isUserExist($email)
    {
        $found = false;
        $user = DB::table('users')
                ->where('email', $email)
                ->first();
        if($user)
        {
            $found = true;
        }

        return $found;
    }

    private function createUser($name, $email, $password)
    {
        $now = Carbon::now('Asia/Manila');
        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'created_at' => $now,
            'updated_at' => $now,
        ]);        
    }
}
