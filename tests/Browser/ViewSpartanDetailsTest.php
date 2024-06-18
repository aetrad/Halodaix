<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Spartan;

class ViewSpartanDetailsTest extends DuskTestCase
{
    public function testViewSpartanDetails()
    {
        // Créer un exemple de Spartan pour le test
        $spartan = Spartan::create([
            'name' => 'Gamma Spartan',
            'pv' => 150,
            'weight' => 70,
            'height' => 1.75,
        ]);

        $this->browse(function (Browser $browser) use ($spartan) {
            $browser->visit('/')
                    ->clickLink('En savoir plus') // Clique sur le lien "En savoir plus"
                    ->assertPathIs('/spartans/' . $spartan->id) // Vérifie que l'URL est correcte
                    ->assertSee($spartan->name) // Vérifie que le nom du Spartan est affiché
                    ->assertSee($spartan->pv) // Vérifie que les PV du Spartan sont affichés
                    ->assertSee($spartan->weight) // Vérifie que le poids du Spartan est affiché
                    ->assertSee($spartan->height); // Vérifie que la taille du Spartan est affichée
        });

        // Nettoyage de l'exemple de Spartan après le test
        $spartan->delete();
    }
}
