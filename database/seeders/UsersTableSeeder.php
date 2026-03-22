<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            // [
            //     'over_name' => '',
            //     'under_name'=> '',
            //     'over_name_kana'=> '',
            //     'under_name_kana'=> '',
            //     'mail_address'=> '',
            //     'sex'=> '',
            //     'birth_day'=> '',
            //     'role'=> '',
            //     'password'=> '',


            //     'created_at' => now(),
            //     'update_at'  => now()

            // ],


                        [
                'over_name' => '鷹野',
                'under_name'=> '雄治',
                'over_name_kana'=> 'タカノ',
                'under_name_kana'=> 'ユウジ',
                'mail_address'=> 'takano@takano',
                'sex'=> '1',
                'birth_day'=> '2001-06-21',
                'role'=> '1',
                'password'=> Hash::make('takano0621'),


                'created_at' => now(),
                'updated_at'  => now()

            ]

        ]);



    }
}
