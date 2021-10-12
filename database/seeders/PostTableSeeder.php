<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $array = range(1,10);
        foreach($array as $n){
            $params = [
                'post' => "テスト${n}",
                'user_id' => "5BLKUkA7uWWe89UTn7KpP4BZlER2"
            ];
            DB::table('posts')->insert($params);
        }
    }
}
