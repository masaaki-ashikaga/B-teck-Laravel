<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'comment' => 'テストコメント１',
            'status' => '1',
        ];
        DB::table('tasks')->insert($param);
        $param = [
            'comment' => 'テストコメント２',
            'status' => '0',
        ];
        DB::table('tasks')->insert($param);
        $param = [
            'comment' => 'テストコメント３',
            'status' => '0',
        ];
        DB::table('tasks')->insert($param);
        $param = [
            'comment' => 'テストコメント４',
            'status' => '0',
        ];
        DB::table('tasks')->insert($param);
        $param = [
            'comment' => 'テストコメント５',
            'status' => '0',
        ];
        DB::table('tasks')->insert($param);
    }
}
