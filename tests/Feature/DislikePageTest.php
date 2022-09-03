<?php

namespace Tests\Feature;

use App\User;
use App\Company;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\WorkerReaction;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class DislikePageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testAuthCreate()
    {
        $workerUser = factory(User::class)->state('Worker')->create();

        $companyUser = factory(User::class)->state('Company')->create();


        $workerReaction  = DB::table('worker_reactions')->create([
          'to_job_id' => $companyUser->id,
          'from_worker_id' => $workerUser->id,
          'status' => 1
      ]);
        Session::start();
        $dislikeResponse = $this->actingAs($workerUser)
                        ->patch("/reaction/ChangeDisliked/{$workerReaction->id}/update",[
                          '_token' => csrf_token(),
                      ]);
            $dislikeResponse->assertStatus(200);
    }

    // public function test(){
    //   $user = factory(User::class)->state('Company')->create();

    //     $company = factory(Company::class)->create([
    //         'user_id' => $user->id
    //     ]);
    // }
}
