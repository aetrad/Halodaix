<x-guest-layout>
    <h1 class="font-bold text-xl mb-4">À propos de l'auteur</h1>
    <div class="text-yellow-400" id="about-text">

        <p id="line1">
        Bonjour et bienvenue sur Halodaix ! Je suis Abdelhilah El Abbouti, un développeur passionné avec une profonde affection pour la programmation et les technologies. Halodaix est le fruit de mon dévouement et de mon enthousiasme pour la création d'applications web innovantes. À travers ce projet, mon objectif est de partager mes connaissances et de contribuer activement à la communauté des développeurs.

        Halodaix est une plateforme conçue pour révolutionner la manière dont nous interagissons avec les applications web. En utilisant les technologies de pointe comme PHP et Laravel, j'ai développé une application robuste, intuitive et efficace. Mon approche s'articule autour de la simplicité d'utilisation, de la performance et de la sécurité, afin de fournir une expérience utilisateur exceptionnelle.

        Fonctionnalités de Halodaix
        Interface Utilisateur Intuitive : Halodaix est doté d'une interface utilisateur conviviale et intuitive qui facilite la navigation et l'accès aux différentes fonctionnalités de l'application.

        Sécurité Renforcée : Grâce à l'utilisation des meilleures pratiques en matière de sécurité web, Halodaix assure la protection des données et la confidentialité des utilisateurs.

        Performance Optimale : Construit avec des technologies modernes, Halodaix offre des performances optimales, garantissant des temps de chargement rapides et une réactivité exceptionnelle.

        Personnalisation et Extensibilité : Halodaix est hautement personnalisable et extensible, permettant aux utilisateurs d'ajouter des fonctionnalités supplémentaires selon leurs besoins spécifiques.



        "Comme le Master Chief dans Halo, Halodaix est conçu pour relever tous les défis technologiques et offrir une expérience utilisateur ultime."

        "Halodaix est à la pointe de l'innovation, tout comme l'armure Mjolnir est à la pointe de la technologie dans l'univers de Halo."

        "Avec Halodaix, nous avons créé une plateforme aussi robuste et fiable que l'UNSC Infinity, prête à affronter les missions les plus complexes."

        "En tant que développeur, je m'inspire de la résilience et de la détermination du Master Chief pour créer des solutions technologiques performantes et durables."

        "Tout comme Cortana est le soutien indispensable du Master Chief, Halodaix est conçu pour être votre compagnon indispensable dans le monde des applications web."


        Merci de visiter Halodaix. J'espère que vous apprécierez cette application autant que j'ai pris plaisir à la créer. Votre retour est précieux pour moi, et je suis impatient de voir comment Halodaix peut vous aider dans vos projets web. Ensemble, faisons avancer la technologie et explorons de nouvelles frontières, un peu comme les héros de Halo.</p>
    </div>
</x-guest-layout>

<script>
document.addEventListener("DOMContentLoaded", function() {
    function typeEffect(element, speed) {
        let text = element.innerHTML;
        element.innerHTML = "";
        let i = 0;
        let timer = setInterval(function() {
            if (i < text.length) {
                element.append(text.charAt(i));
                i++;
            } else {
                clearInterval(timer);
            }
        }, speed);
    }

    let speed = 60; // Vitesse de l'effet
    let line1 = document.getElementById('line1');
    let line2 = document.getElementById('line2');

    typeEffect(line1, speed);

    // Ajoute un délai avant de commencer la deuxième ligne
    setTimeout(function() {
        typeEffect(line2, speed);
    }, line1.innerHTML.length * speed + 500); // Délai basé sur la longueur du texte
});
</script>

<style>
    #about-text {
        white-space: pre-wrap; /* Préserve les espaces et les retours à la ligne */
    }
</style>
