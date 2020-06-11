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
            'status' => '2',
        ];
        DB::table('tasks')->insert($param);
        $param = [
            'comment' => 'テストコメント３',
            'status' => '3',
        ];
        DB::table('tasks')->insert($param);
        $param = [
            'comment' => 'テストコメント４',
            'status' => '4',
        ];
        DB::table('tasks')->insert($param);
        $param = [
            'comment' => 'テストコメント５',
            'status' => '5',
        ];
        DB::table('tasks')->insert($param);
    }
}
