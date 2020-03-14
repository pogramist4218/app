<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TreeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tree')->truncate();
        DB::table('tree')->insert([
                'parent_id' => '0',
                'name' => 'Names',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        $this->addItemOnTree(1, 3, 3);
    }

    private function addItemOnTree($parent_id, $count, $level) {
        if($level == 0) {
            return 0;
        }
        if($count == 0) {
            $level--;
        } else {
            for($i = 0; $i < $count; $i++) {
                DB::table('tree')->insert([
                'parent_id' => $parent_id,
                'name' => Faker\Factory::create()->name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            }
            $count--;
            $parent_id++;
            $this->addItemOnTree($parent_id, $count, $level);
        }
    }
}
