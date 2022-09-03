<?php

namespace Tests\Feature;

use App\User;
use App\Company;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DislikePageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testAuthCreate()
    {
        $user = factory(User::class)->state('Company')->create();

        $company = factory(Company::class)->create([
            'user_id' => $user->id
        ]);

        $responseUser = $this->actingAs($user)
                        ->withSession(['foo' => 'bar'])
                        ->get('/');
            $responseUser->assertStatus(200);

        // $responseCompany = $this->actingAs($company)
        //                 ->withSession(['foo' => 'bar'])
        //                 ->get('/');

    }
}
