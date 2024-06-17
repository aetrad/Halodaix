<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateSpartanTest extends DuskTestCase
{
    public function testCreateSpartan()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/spartans/create')
                    ->type('name', 'Test Spartan')
                    ->type('pv', '100')
                    ->type('weight', '90.5')
                    ->type('height', '2.1')
                    ->attach('image', __DIR__.'/files/test-image.png')
                    ->press('Ajouter')
                    ->assertPathIs('/admin/spartans')
                    ->assertSee('Test Spartan');
        });
    }
}

