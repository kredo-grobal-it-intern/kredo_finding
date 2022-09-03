<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\User;
use App\Company;


class DislikePageTest extends TestCase
{
  use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAuthCreate()
    {
        $user = factory(User::class)->create();
        $company = factory(Company::class)->create();

        $responseUser = $this->actingAs($user)
                        ->withSession(['foo' => 'bar'])
                        ->get('/');
                        $responseUser->assertStatus(200);

        $responseCompany = $this->actingAs($company)
                        ->withSession(['foo' => 'bar'])
                        ->get('/');

    }

    public function testChangeDislikeToLike($id){

    }
}
