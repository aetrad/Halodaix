<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testHomePageLoadsCorrectly()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->screenshot('homepage')
                    ->assertSee('Bienvenue sur Halodaix');
        });
    }
}
