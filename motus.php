<?php
// Faire appel au fichier de fonctions
require_once 'function/function.php';

// Liste des 20 mots à deviner
$mots = ["pomme", "maison", "chat", "livre", "arbre", "voiture", "ballon", "école", "fleur", "chien",
    "fenêtre", "ciel", "table", "porte", "manteau", "pain", "soleil", "neige", "chaise", "livre"];

function jeuMotus($mots) {
    $motchoisi = choisirMot($mots);
    $nbessais = 3;
    $lettresDevinees = [];
    $motAffiche = str_repeat('_', strlen($motchoisi));

    echo "Bienvenue dans Motus !\n";
    echo "Le mot à deviner a " . strlen($motchoisi) . " lettres.\n";

    // Boucle jusqu'à ce que le mot soit deviné
    while ($nbessais > 0 && strpos($motAffiche, '_') !== false) {
        echo "Il vous reste $nbessais essais.\n";
        afficherMotActuel($motAffiche);

        $lettre = demanderLettre();
        if (!$lettre) continue; // Si ce n'est pas la bonne lettre, on continue

        if (in_array($lettre, $lettresDevinees)) {
            echo "Vous avez déjà deviné la lettre '$lettre'. Essayez une autre lettre.\n";
            continue;
        }

        $lettresDevinees[] = $lettre;

        if (strpos($motchoisi, $lettre) === false) {
            echo "La lettre '$lettre' n'est pas dans le mot.\n";
            $nbessais--; // Réduire le nombre d'essais
        } else {
            echo "Bien joué ! La lettre '$lettre' est dans le mot.\n";
            // Mettre à jour le mot affiché
            $motAffiche = mettreAJourMotAffiche($motchoisi, $motAffiche, $lettre);
        }
    }

    afficherResultatFinal($motAffiche, $motchoisi);
}

// Lancer le jeu
jeuMotus($mots);

?>
