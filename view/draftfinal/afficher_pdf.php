<?php
$nomFichier = 'Bulletin.pdf';
$chemin = __DIR__ . './view/draftfinal/' . $nomFichier;

if (file_exists($chemin)) {
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . $nomFichier . '"');
    header('Content-Length: ' . filesize($chemin));
    readfile($chemin);
    exit;
} else {
    echo "Fichier introuvable.";
}
