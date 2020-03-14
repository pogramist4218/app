<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call('UserTableSeeder');
    	$this->command->info('Таблица <user> заполнена данными!');


    	$this->call('TreeTableSeeder');
		$this->command->info('Таблица <category> заполнена данными!');    
	}
}
