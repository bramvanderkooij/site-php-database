<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class MigrateAndSeed extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/';
    }
    /**
     * run DB migrate and DB seed.
     *
     * @return array
     */
    public function MigrateAndSeed()
    {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }
}
