<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database;
use App\Model\Article;

// 1. SÉCURITÉ : Vérifier si connecté
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php?error=Vous devez être connecté.');
    exit;
}

// Vérifier méthode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../blog.php');
    exit;
}

// 2. RÉCUPÉRATION DES DONNÉES
$titre = trim($_POST['titre']);
$theme = $_POST['theme'];
$contenu = trim($_POST['contenu']);
$userId = $_SESSION['user']['id'];

// Validation simple
if (empty($titre) || empty($contenu) || empty($theme)) {
    header('Location: ../create_article.php?error=Veuillez remplir tous les champs');
    exit;
}

// 3. GESTION DE L'IMAGE
$imageUrl = null;

if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];
    $filename = $_FILES['image']['name'];
    $fileTmp = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    // Vérifs
    if (in_array($ext, $allowed) && $fileSize < 5000000) { // Max 5Mo
        
        // Création du dossier si inexistant
        $uploadDir = __DIR__ . '/../assets/uploads/articles/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Nom unique
        $newName = uniqid('article_', true) . '.' . $ext;
        $destination = $uploadDir . $newName;

        // Déplacement
        if (move_uploaded_file($fileTmp, $destination)) {
            $imageUrl = 'assets/uploads/articles/' . $newName; // Chemin relatif pour la BDD
        } else {
            header('Location: ../create_article.php?error=Erreur lors de l\'upload de l\'image');
            exit;
        }
    } else {
        header('Location: ../create_article.php?error=Format invalide ou image trop lourde');
        exit;
    }
} else {
    // Si l'image est obligatoire, on bloque ici
    header('Location: ../create_article.php?error=Une image est obligatoire');
    exit;
}

// 4. SAUVEGARDE EN BDD
try {
    $database = new Database();
    $conn = $database->getConnection();

    if (Article::create($conn, $titre, $contenu, $imageUrl, $theme, $userId)) {
        header('Location: ../blog.php?success=Article publié avec succès !');
        exit;
    } else {
        header('Location: ../create_article.php?error=Erreur lors de l\'enregistrement');
        exit;
    }

} catch (Exception $e) {
    header('Location: ../create_article.php?error=Erreur système : ' . $e->getMessage());
    exit;
}
