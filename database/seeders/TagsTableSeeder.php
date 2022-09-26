<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'tag' => '衣装制作'
        ];
        Tag::create($param);
        $param = [
            'tag' => '買い出し'
        ];
        Tag::create($param);
        $param = [
            'tag' => '衣装合わせ'
        ];
        Tag::create($param);
    }
}
