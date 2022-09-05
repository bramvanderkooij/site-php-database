<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthTest extends DuskTestCase
{
     public function setUp(): void
    {
        $this->appUrl = env('APP_URL');
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }

    /** @test */
    public function a_user_can_register()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('http://project6/register')
                ->type('name', 'User')
                ->type('email', 'User@user.com')
                ->type('password', 'password')
                ->type('password_confirmation', 'password')
                ->click('button[type="submit"]')
                ->assertSee('Logout')
                ->clicklink('Logout')
                ->assertSee('Hello Guest');
        });
    }
    /** @test */
    public function a_user_can_login()
    {
        User::create([
            'name' => 'User2',
            'email' => 'User2@user.com',
            'password' => bcrypt('password'),
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('http://project6')
                ->clicklink('Login')
                ->type('email', 'User2@user.com')
                ->type('password', 'password')
                ->click('button[type="submit"]')
                ->assertSee('Logout');
        });
    }
}
