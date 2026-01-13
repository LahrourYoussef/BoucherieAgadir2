<?php
include_once 'modeles/BaseCompetenceDAO.php';
include_once 'configBdd.php';

if (isset($_GET['action']))
    $action = filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
else
    $action = "aPropos";


switch ($action) {
    case 'aPropos':
        $connexionBDComp = new BaseCompetenceDAO();
        $lesCompetences = $connexionBDComp->getLesCompetences();
        include_once 'vues/competence.php';
        break;
    
    case 'rechercher':
       case 'rechercher':
    // Récupérer le paramètre q du formulaire GET
    $motCle = isset($_GET['q']) ? $_GET['q'] : '';

    $connexionBDComp = new BaseCompetenceDAO();
    $lesCompetences = $connexionBDComp->rechercherCompetence($motCle);
    include_once 'vues/competence.php';
    break;

}
