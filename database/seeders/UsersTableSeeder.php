<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'さやま',
            'email' => '1@1',
            'password' => '11111111'
        ];
        User::create($param);
        $param = [
            'name' => 'まとば',
            'email' => '2@2',
            'password' => '11111111'
        ];
        User::create($param);
        $param = [
            'name' => 'しまぶくろ',
            'email' => '3@3',
            'password' => '11111111'
        ];
        User::create($param);
    }
}
