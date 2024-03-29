<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->truncate();

    factory(User::class, 50)->state('Worker')->create();
    factory(User::class, 50)->state('Company')->create();
  }
}
