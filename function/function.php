<?php

// Fonction pour choisir un mot au hasard parmi un tableau
function choisirMot($mots) {
    return $mots[array_rand($mots)];
}

// Fonction pour afficher le mot actuel (avec des tirets pour les lettres non devinées)
function afficherMotActuel($motAffiche) {
    echo "Mot actuel : $motAffiche\n";
}

// Fonction pour demander une lettre à l'utilisateur et vérifier qu'elle est valide
function demanderLettre() {
    $lettre = readline("Saisir une lettre : ");
    // Valider l'entrée pour qu'il s'agisse d'une seule lettre valide
    if (strlen($lettre) != 1 || !ctype_alpha($lettre)) {
        echo "Veuillez saisir une seule lettre valide.\n";
        return null;
    }
    return strtolower($lettre);
}

// Fonction pour mettre à jour le mot affiché en remplaçant les tirets par les lettres devinées
function mettreAJourMotAffiche($motchoisi, $motAffiche, $lettre) {
    $motAffiche = str_split($motAffiche);
    for ($i = 0; $i < strlen($motchoisi); $i++) {
        if ($motchoisi[$i] === $lettre) {
            $motAffiche[$i] = $lettre;
        }
    }
    return implode('', $motAffiche);
}

// Fonction pour afficher le résultat final du jeu
function afficherResultatFinal($motAffiche, $motchoisi) {
    if (strpos($motAffiche, '_') === false) {
        echo "Félicitations ! Vous avez deviné le mot : '$motchoisi'.\n";
    } else {
        echo "Dommage ! Vous n'avez plus d'essais. Le mot était : '$motchoisi'.\n";
    }
}

?>
