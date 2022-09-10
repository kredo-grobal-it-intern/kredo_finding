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

    public function testDislikeFunctionality()
    {
        $workerUser = factory(User::class)->state('Worker')->create();
        $companyUser = factory(User::class)->state('Company')->create();

        DB::table('worker_reactions')->insert([
          'to_job_id' => $companyUser->id,
          'from_worker_id' => $workerUser->id,
          'status' => 1
        ]);

        // Session::start();
        $dislikeResponse = $this->actingAs($workerUser)
                        ->patch("/reaction/ChangeDisliked/{$companyUser->id}/update"
                      );
        $dislikeResponse->assertStatus(419);
    }

  public function testDislikeTokenMismatchWhenTheresNoToken(){
        $workerUser = factory(User::class)->state('Worker')->create();
        $companyUser = factory(User::class)->state('Company')->create();

        DB::table('worker_reactions')->insert([
          'to_job_id' => $companyUser->id,
          'from_worker_id' => $workerUser->id,
          'status' => 1
        ]);
        $dislikeResponse = $this->actingAs($workerUser)
        ->patch("/reaction/ChangeDisliked/{$companyUser->id}/update");
          $dislikeResponse->assertRedirect(route('reaction.changeDislikedToLike'));
  }

  public function testCheckUserStatusWhenChangeDisliked(){
        $workerUser = factory(User::class)->state('Worker')->create();
        $companyUser = factory(User::class)->state('Company')->create();
          DB::table('worker_reactions')->insert([
          'to_job_id' => $companyUser->id,
          'from_worker_id' => $workerUser->id,
          'status' => 1
        ]);

        Session::start();
        $dislikeResponse = $this->actingAs($workerUser)
        ->from('/mypage/reaction/showDisliked')->patch("/reaction/ChangeDisliked/{$companyUser->id}/update",[
          '_token' => csrf_token(),
        ]);
        $this->assertDatabaseHas('worker_reactions', [
          'to_job_id' => $companyUser->id,
          'from_worker_id' => $workerUser->id,
          'status' => 0
      ]);
  }
}
