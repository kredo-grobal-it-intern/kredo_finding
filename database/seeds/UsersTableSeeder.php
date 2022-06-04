<?php

use Illuminate\Database\Seeder;

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
      ['name' => 'Steven Paul Jobs',
        'email' => 'user1@example.com',
        'gender' => '0',
        'self_introduction' => 'I am Jobs',
        'img_name' => 'sample001.jpg',
        'password' => Hash::make('password123'),
      ],
      ['name' => 'Mark Elliot Zuckerberg',
        'email' => 'user2@example.com',
        'gender' => '1',
        'self_introduction' => 'I am Zuckerberg',
        'img_name' => 'sample002.jpg',
        'password' => Hash::make('password123'),
      ],
      ['name' => 'Jeffrey Preston Bezos',
        'email' => 'user3@example.com',
        'gender' => '0',
        'self_introduction' => 'I am Jeffrey',
        'img_name' => 'sample003.jpg',
        'password' => Hash::make('password123'),
      ],
      ['name' => 'Elon Reeve Musk',
        'email' => 'user4@example.com',
        'gender' => '0',
        'self_introduction' => 'I am Elon',
        'img_name' => 'sample004.jpg',
        'password' => Hash::make('password123'),
      ],
    ]);
  }
}


