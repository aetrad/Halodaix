<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Spartan;

class SearchSpartanTest extends DuskTestCase
{
    public function testSearchSpartan()
    {
        // Créer des exemples de Spartans pour le test
        $spartan1 = Spartan::create(['name' => 'Alpha Spartan', 'pv' => 100, 'weight' => 75, 'height' => 1.80]);
        $spartan2 = Spartan::create(['name' => 'Beta Spartan', 'pv' => 200, 'weight' => 80, 'height' => 1.85]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('search', 'Alpha') // Tape "Alpha" dans la barre de recherche
                    ->press('button[type="submit"]') // Appuie sur le bouton de recherche
                    ->assertSee('Alpha Spartan') // Vérifie que "Alpha Spartan" est visible
                    ->assertDontSee('Beta Spartan'); // Vérifie que "Beta Spartan" n'est pas visible
        });

        // Nettoyage des exemples de Spartans après le test
        $spartan1->delete();
        $spartan2->delete();
    }
}
