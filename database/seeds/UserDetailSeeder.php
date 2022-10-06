<?php

use Illuminate\Database\Seeder;
use App\Models\UserDetail;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_detail = new UserDetail();
        $new_detail->user_id = 1;
        $new_detail->name = 'Daniele';
        $new_detail->surname = 'Di Mento';
        $new_detail->city = 'Messina';
        $new_detail->address = 'Spadafora';
        $new_detail->save();
    }
}
