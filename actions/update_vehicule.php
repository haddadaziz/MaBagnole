<?php

require_once __DIR__ . '/../vendor/autoload.php';
use App\Database;
use App\Model\Vehicule;


$id = $_POST['id'];
$marque = trim($_POST['marque']);
$modele = trim($_POST['modele']);
$prix = $_POST['prix'];
$categorie_id = $_POST['categorie_id'];

if (empty($id) || empty($marque) || empty($modele) || empty($prix)) {
    header('Location: ../admin_vehicules.php?error=champs_manquants');
    exit;
}


$database = new Database();
$conn = $database->getConnection();

$result = Vehicule::update($conn, $id, $marque, $modele, $prix, $categorie_id, $imageUrl);

if ($result) {
    header('Location: ../admin_vehicules.php?status=success_modifier_vehicule');
} else {
    header('Location: ../admin_vehicules.php?status=echec_modifier_vehicule');
}
exit;