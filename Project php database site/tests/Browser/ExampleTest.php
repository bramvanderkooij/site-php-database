<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */

    /** only use when running solo
     public function setUp(): void
    {
        $this->appUrl = env('APP_URL');
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }
     */

    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://project6')
                ->assertSee('Vapor');
        });
    }
}
