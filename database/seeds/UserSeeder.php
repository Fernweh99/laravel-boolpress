<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_user = new User();

        $new_user->name = 'Fern';
        $new_user->email = 'fern@live.com';
        $new_user->password = bcrypt('password');

        $new_user->save();
    }
}
