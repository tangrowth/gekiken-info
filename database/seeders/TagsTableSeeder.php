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
            'tag' => '買い出し'
        ];
        Tag::create($param);
        $param = [
            'tag' => '衣装作成'
        ];
        Tag::create($param);
        $param = [
            'tag' => '衣装合わせ'
        ];
        Tag::create($param);
        $param = [
            'tag' => '反省'
        ];
        Tag::create($param);
        $param = [
            'tag' => '衣装管理'
        ];
        Tag::create($param);
        $param = [
            'tag' => 'その他'
        ];
        Tag::create($param);
    }
}
