<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MovieDeleteTest extends DuskTestCase
{

/**
    public function setUp(): void
    {
    $this->appUrl = env('APP_URL');
    parent::setUp();
    $this->artisan('migrate:fresh');
    $this->artisan('db:seed');
    }
*/
    /** @test */
    public function An_Admin_can_delete_a_movie()
    {

        $this->browse(function (Browser $browser) {
            $browser->maximize();
            $browser->visit('http://project6')
                ->clicklink('Login')
                ->type('email', 'admin@tcrmbo.nl')
                ->type('password', 'test1234')
                ->click('button[type="submit"]')
                ->assertSee('Vapor')
                ->visit('http://project6/admin/movies')
                ->assertSee('movies Admin')
                ->clickLink('Delete')
                ->assertSee('movie Deleter')
                ->click('button[type="submit"]')
                ->assertSee('movies Admin');
        });
    }
}
