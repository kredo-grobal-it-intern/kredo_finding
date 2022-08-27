<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Socialite;
use Mockery;
use Session;

class SnsLoginTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Mockery::getConfiguration()->allowMockingNonExistentMethods(false);

        $this->providerName = 'google';

        $this->user = Mockery::mock('Laravel\Socialite\Two\User');
        $this->user
            ->shouldReceive('getId')
            ->andReturn(uniqid())
            ->shouldReceive('getEmail')
            ->andReturn(uniqid().'@gmail.com')
            ->shouldReceive('getName')
            ->andReturn('name');

        $this->provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $this->provider->shouldReceive('user')->andReturn($this->user);
    }

    public static function tearDownAfterClass(): void
    {
        Mockery::getConfiguration()->allowMockingNonExistentMethods(true);
    }

    public function test_show_google_authentication()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);

        $response->assertSeeText('Sign in with Google+');

        $response = $this->get(route('google.redirect'));

        $response->assertStatus(302);

        $target = parse_url($response->headers->get('location'));

        $this->assertEquals('accounts.google.com', $target['host']);

        $query = explode('&', $target['query']);

        $this->assertContains('redirect_uri=' . urlencode(config('services.google.redirect')), $query);

        $this->assertContains('client_id=' . config('services.google.client_id'), $query);
    }

    public function test_register_with_google_login()
    {   
        $this->withoutExceptionHandling();

        Socialite::shouldReceive('driver')->with('google')->once()->andReturn($this->provider);

        $this->get(route('google.callback', ['service' => $this->providerName]))
                ->assertStatus(302)
                ->assertRedirect(route('home'));

        $this->assertDatabaseHas('users', [
            'name' => $this->user->getName(),
            'email' => $this->user->getEmail()
        ]);

        $this->assertAuthenticated();
    }

    public function test_user_already_registered()
    {
        $user = factory(User::class)->create();

        $this->assertDatabaseHas('users', ['name' => $user->name]);

        $this->assertGuest();

        Socialite::shouldReceive('driver')->with('google')->once()->andReturn($this->provider);

        $response = $this->get(route('google.callback'));

        $response->assertStatus(302)->assertRedirect('/home');

        $this->assertAuthenticatedAs($user);
    }
}
