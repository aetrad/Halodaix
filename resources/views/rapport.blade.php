<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-yellow-500 mb-4">Rapport Technique: Halodaix avec Laravel et TailwindCSS</h1>
            <h2 class="text-xl font-bold text-white mb-2">El abbouti Abdelhilah</h2>
            <h3 class="text-lg text-gray-400 mb-4">Projet de développement SGBD</h3>
            <h4 class="text-lg text-gray-400 mb-4">Professeur: Thibault Six</h4>
            <p class="text-gray-300 text-lg mb-8">Date de Soumission: 18 juin 2024</p>

            <h2 class="text-2xl font-bold text-yellow-500 mb-4">Table des Matières</h2>
            <ul class="list-disc list-inside text-gray-300 mb-8">
                <li>Introduction</li>
                <li>Analyse des Besoins</li>
                <li>Conception de la Base de Données</li>
                <li>Architecture du Système</li>
                <li>Implémentation</li>
                <li>Tests</li>
                <li>Interface Utilisateur</li>
                <li>Discussion</li>
                <li>Réflexions Personnelles</li>
                <li>Utilisation de GPT</li>
                <li>Conclusion</li>
                <li>Annexes</li>
                <li>Bibliographie</li>
            </ul>

            <h2 class="text-2xl font-bold text-yellow-500 mb-4">Introduction</h2>
            <p class="text-gray-300 mb-4">
                <strong>Présentation du projet :</strong><br>
                Halodaix est une application web développée avec Laravel et TailwindCSS, visant à gérer les Spartans, leurs types et attaques. Le projet a été conçu en suivant les directives du tutoriel de blog de notre professeur Thibault Six, pour nous aider à comprendre les concepts de base de Laravel et l'utilisation de TailwindCSS pour le design.
            </p>
            <p class="text-gray-300 mb-8">
                <strong>Contexte du projet :</strong><br>
                Laravel a été choisi pour sa robustesse, sa facilité de développement et ses fonctionnalités intégrées pour la gestion des bases de données, l'authentification et les tests. TailwindCSS a été sélectionné pour son approche utilitaire, facilitant la création d'interfaces modernes et réactives sans écrire de CSS personnalisé.
            </p>

            <h2 class="text-2xl font-bold text-yellow-500 mb-4">Analyse des Besoins</h2>
            <p class="text-gray-300 mb-4">
                <strong>Exigences fonctionnelles :</strong>
                <ul class="list-disc list-inside">
                    <li>Gestion des Spartans (CRUD).</li>
                    <li>Gestion des types et des attaques.</li>
                    <li>Authentification et autorisation des utilisateurs.</li>
                    <li>Interface utilisateur réactive et moderne.</li>
                    <li>Tests automatisés pour assurer la qualité.</li>
                </ul>
            </p>
            <p class="text-gray-300 mb-4">
                <strong>Exigences non fonctionnelles :</strong>
                <ul class="list-disc list-inside">
                    <li>Performance rapide et réactive.</li>
                    <li>Interface utilisateur intuitive.</li>
                    <li>Sécurité des données utilisateur.</li>
                    <li>Compatibilité avec les navigateurs modernes.</li>
                </ul>
            </p>
            <p class="text-gray-300 mb-8">
                <strong>Analyse des utilisateurs cibles :</strong><br>
                Les utilisateurs cibles incluent les administrateurs qui gèrent les Spartans, les types et les attaques, ainsi que les visiteurs qui peuvent consulter les profils des Spartans et leurs caractéristiques.
            </p>

            <h2 class="text-2xl font-bold text-yellow-500 mb-4">Conception de la Base de Données</h2>
            <p class="text-gray-300 mb-4">
                <strong>Schéma de la base de données :</strong>
                <ul class="list-disc list-inside">
                    <li>Spartans : id, name, pv, weight, height, image</li>
                    <li>Types : id, name, color</li>
                    <li>Attacks : id, name, description, type_id</li>
                    <li>Comments : id, body, user_id, spartan_id</li>
                </ul>
            </p>
            <p class="text-gray-300 mb-8">
                <strong>Diagramme de Classe UML :</strong><br>
                <img src="{{ asset('storage/images/umlclass.png') }}" alt="Diagramme de Classe UML" class="w-full max-w-lg h-auto mx-auto rounded-lg shadow-lg">
            </p>

            <h2 class="text-2xl font-bold text-yellow-500 mb-4">Architecture du Système</h2>
            <p class="text-gray-300 mb-4">
                <strong>Description de l'architecture logicielle :</strong><br>
                Le projet Halodaix utilise le modèle MVC (Model-View-Controller) de Laravel. Les modèles représentent les données, les vues sont les interfaces utilisateur, et les contrôleurs gèrent la logique de l'application.
            </p>
            <p class="text-gray-300 mb-8">
                <strong>Diagrammes d'architecture :</strong><br>
                <!-- Inclure des diagrammes détaillant les interactions entre les composants du système -->
            </p>

            <h2 class="text-2xl font-bold text-yellow-500 mb-4">Implémentation</h2>
            <p class="text-gray-300 mb-4">
                <strong>Fonctionnalités principales implémentées :</strong>
                <ul class="list-disc list-inside">
                    <li>CRUD pour Spartans : Les administrateurs peuvent créer, lire, mettre à jour et supprimer des Spartans.</li>
                    <li>Gestion des Types et Attaques : Les types et les attaques peuvent être gérés de manière similaire aux Spartans.</li>
                    <li>Authentification et Autorisation : Utilisation de Laravel Breeze pour l'authentification et les autorisations.</li>
                    <li>Interface Utilisateur : Conçue avec TailwindCSS pour une apparence moderne et réactive.</li>
                </ul>
            </p>
            <p class="text-gray-300 mb-4">
                <strong>Extraits de code significatifs :</strong>
                <br><br>
                <strong>Création d'un Spartan :</strong><br>
                <pre class="bg-gray-900 text-gray-300 p-4 rounded"><code>
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'pv' => 'required|integer',
        'weight' => 'required|numeric',
        'height' => 'required|numeric',
    ]);

    $spartan = Spartan::create($request->all());

    return redirect()->route('admin.spartans.index')->with('success', 'Spartan créé avec succès.');
}
                </code></pre>
                <br><br>
                <strong>Test d'intégration :</strong><br>
                <pre class="bg-gray-900 text-gray-300 p-4 rounded"><code>
public function testCreateSpartan()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/admin/spartans/create')
                ->type('name', 'Test Spartan')
                ->type('pv', '100')
                ->type('weight', '75')
                ->type('height', '1.80')
                ->press('Ajouter')
                ->assertPathIs('/admin/spartans');
    });
}
                </code></pre>
            </p>

            <h2 class="text-2xl font-bold text-yellow-500 mb-4">Tests</h2>
            <p class="text-gray-300 mb-4">
                <strong>Stratégie de test :</strong><br>
                Nous avons adopté une stratégie de test complète en utilisant Laravel Dusk, en suivant les directives du tutoriel de notre professeur. Cela nous a permis d'automatiser les tests d'interface utilisateur pour nous assurer que les fonctionnalités principales fonctionnent comme prévu.
            </p>
            <p class="text-gray-300 mb-4">
                <strong>Scénarios de test et résultats obtenus :</strong>
                <br><br>
                <strong>Test de la page d'accueil :</strong><br>
                <pre class="bg-gray-900 text-gray-300 p-4 rounded"><code>
public function testHomePageLoadsCorrectly()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
                ->assertSee('Bienvenue sur Halodaix');
    });
}
                </code></pre>
                <br><br>
                <strong>Test de création de Spartan :</strong><br>
                <pre class="bg-gray-900 text-gray-300 p-4 rounded"><code>
public function testCreateSpartan()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/admin/spartans/create')
                ->type('name', 'Test Spartan')
                ->type('pv', '100')
                ->type('weight', '75')
                ->type('height', '1.80')
                ->press('Ajouter')
                ->assertPathIs('/admin/spartans');
    });
}
                </code></pre>
            </p>
            <p class="text-gray-300 mb-8">
                Les résultats des tests montrent que toutes les fonctionnalités principales fonctionnent comme prévu, avec des scénarios d'interaction utilisateur testés avec succès.
            </p>

            <h2 class="text-2xl font-bold text-yellow-500 mb-4">Interface Utilisateur</h2>
            <p class="text-gray-300 mb-4">
                <strong>Choix de design :</strong><br>
                Nous avons utilisé TailwindCSS pour concevoir une interface utilisateur réactive et moderne. Les classes utilitaires de Tailwind nous ont permis de créer des composants cohérents et esthétiques rapidement.
            </p>
            <p class="text-gray-300 mb-8">
                <strong>Captures d'écran :</strong><br>
                <!-- Inclure des captures d'écran ici -->
                <img src="{{ asset('storage/images/captuser.png') }}" alt="Page d'accueil" class="w-full max-w-lg h-auto mx-auto rounded-lg shadow-lg mb-4">
                <img src="{{ asset('storage/images/captadmin.png') }}" alt="Formulaire de création de Spartan" class="w-full max-w-lg h-auto mx-auto rounded-lg">
            </p>
            <p class="text-gray-300 mb-8">
                <strong>Description des interactions :</strong><br>
                L'interface utilisateur est conçue pour être intuitive, avec des boutons clairement visibles pour les actions principales, des formulaires bien structurés et des messages de retour d'information pour guider l'utilisateur.
            </p>

            <h2 class="text-2xl font-bold text-yellow-500 mb-4">Discussion</h2>
            <p class="text-gray-300 mb-4">
                <strong>Réflexion sur les résultats :</strong><br>
                Le projet Halodaix a atteint la plupart des objectifs initiaux. L'utilisation de Laravel a permis de développer rapidement une application robuste, et TailwindCSS a facilité la création d'une interface utilisateur moderne et cohérente.
            </p>
            <p class="text-gray-300 mb-4">
                <strong>Limitations et améliorations :</strong><br>
                Certaines fonctionnalités peuvent être améliorées, notamment l'optimisation des requêtes pour améliorer les performances et l'ajout de tests unitaires plus complets pour couvrir davantage de scénarios.
            </p>

            <h2 class="text-2xl font-bold text-yellow-500 mb-4">Réflexions Personnelles</h2>
            <p class="text-gray-300 mb-4">
                <strong>Défis rencontrés :</strong>
                <ul class="list-disc list-inside">
                    <li>Gestion des dépendances : L'installation et la configuration de Laravel Dusk ont présenté des défis, notamment en raison des incompatibilités de version.</li>
                    <li>Optimisation des performances : Nous avons dû ajuster certaines requêtes pour améliorer les temps de réponse.</li>
                </ul>
            </p>
            <p class="text-gray-300 mb-4">
                <strong>Aspects satisfaisants :</strong>
                <ul class="list-disc list-inside">
                    <li>Interface utilisateur : La création d'une interface utilisateur réactive et moderne a été particulièrement satisfaisante.</li>
                    <li>Automatisation des tests : L'intégration de Laravel Dusk a permis d'automatiser les tests, ce qui a considérablement amélioré la fiabilité de l'application.</li>
                </ul>
            </p>
            <p class="text-gray-300 mb-8">
                <strong>Compétences acquises :</strong>
                <ul class="list-disc list-inside">
                    <li>Maîtrise de Laravel : Développement rapide d'applications web robustes.</li>
                    <li>Utilisation de TailwindCSS : Création d'interfaces utilisateur modernes sans CSS personnalisé.</li>
                    <li>Automatisation des tests : Connaissance approfondie de Laravel Dusk pour les tests d'interface utilisateur.</li>
                </ul>
            </p>

            <h2 class="text-2xl font-bold text-yellow-500 mb-4">Utilisation de GPT</h2>
            <p class="text-gray-300 mb-4">
                <strong>Assistance de GPT :</strong><br>
                GPT a été utilisé principalement pour résoudre des problèmes de code spécifiques, fournir des exemples de tests et structurer le rapport technique. La majorité des tâches ont été réalisées en suivant le tutoriel de blog fourni par le professeur, garantissant ainsi l'intégrité du travail personnel.
            </p>
            <p class="text-gray-300 mb-8">
                <strong>Évaluation de l'efficacité de GPT :</strong><br>
                GPT s'est avéré très utile pour accélérer le développement et fournir des solutions efficaces aux problèmes rencontrés. Des améliorations pourraient inclure une meilleure compréhension des contextes complexes de projet.
            </p>

            <h2 class="text-2xl font-bold text-yellow-500 mb-4">Conclusion</h2>
            <p class="text-gray-300 mb-4">
                <strong>Synthèse des accomplissements :</strong><br>
                Halodaix est un projet réussi, offrant une interface utilisateur intuitive et une gestion efficace des Spartans. L'utilisation de Laravel et TailwindCSS a permis de développer rapidement une application moderne et réactive.
            </p>
            <p class="text-gray-300 mb-8">
                <strong>Perspectives futures :</strong><br>
                Les futures améliorations pourraient inclure l'optimisation des performances, l'ajout de nouvelles fonctionnalités et l'extension des tests pour couvrir davantage de scénarios.
            </p>

            <h2 class="text-2xl font-bold text-yellow-500 mb-4">Annexes</h2>
            <p class="text-gray-300 mb-4">
                <strong>Codes sources complets :</strong><br>
                Inclus dans le dépôt GitHub du projet.
            </p>
            <p class="text-gray-300 mb-4">
                <strong>Ressources supplémentaires :</strong><br>
                Liens vers la documentation de Laravel et TailwindCSS.
            </p>

            <h2 class="text-2xl font-bold text-yellow-500 mb-4">Bibliographie</h2>
            <ul class="list-disc list-inside text-gray-300 mb-8">
                <li><a href="https://laravel.com/docs" class="text-blue-500 hover:text-blue-700">Documentation Laravel</a></li>
                <li><a href="https://tailwindcss.com/docs" class="text-blue-500 hover:text-blue-700">Documentation TailwindCSS</a></li>
                <li><a href="https://laravel.com/docs/dusk" class="text-blue-500 hover:text-blue-700">Laravel Dusk</a></li>
            </ul>
        </div>
    </div>
</x-guest-layout>
