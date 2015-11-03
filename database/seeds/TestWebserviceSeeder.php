<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TestWebserviceSeeder extends Seeder {

    public function run()
    {
        DB::table('test_webservices')->delete();

        User::create(['daily_date_time' => date('Y-m-d H:i:s')]);
        User::create(['user_id' => 1]);
        User::create(['no_user_registered' => 5]);
        User::create(['iphone_download' => 66]);
        User::create(['android_download' => 44]);
        User::create(['black_berry_download' => 'foo@bar.com']);
        User::create(['daily_sale' => 5555]);
        User::create(['created_at' => date('Y-m-d H:i:s')]);
        User::create(['create_by' => 1]);
        User::create(['manage_by' => 1]);
    }

}