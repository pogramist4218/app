<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->truncate();
	    DB::table('users')->insert([
	            'name' => 'root',
	            'phone' => '9155705734',
	            'password' => bcrypt('dd42flu35OGG819'),
	            'remember_token' => Str::random(10),
		        'created_at' => Carbon::now(),
		        'updated_at' => Carbon::now(),
	        ]);
	    factory(App\User::class, 4)->create()->each(function($u) {
	        $u->save();
	    });
    }
}
