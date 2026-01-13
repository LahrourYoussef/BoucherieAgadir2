<?php
// lien vers la classe mère
include_once "BaseDAO.php";
include_once "Stock.php";

/**
 * Modifications :
 * - création d'une classe spécifique pour chaque table de la base de données
 * - modification du constructeur : instruction de connexion enlevée
 * - réalisation de la connexion en décalé afin de pouvoir
 *   définir un accès spécifique selon le type d'opération à réaliser
 */

class BaseStockDAO extends BaseDAO
{
    protected $connexion;

    public function __construct()
    {
        parent::__construct(); // par défaut la connexion n'est pas établie.
    }

    /**
     * Méthode permettant de définir la connexion
     * à la base de données
     * avec les habilitations les plus adéquates (droits restreints)
     * selon l'action à réaliser
     */
    private function setConnexionSelonRole(string $role)
    {
        $this->setConnexionBase($_ENV['local_dsn'], $_ENV[$role], $_ENV['pwd' . $role], $_ENV['options']);
    }

    // Nouvelle méthode créée à l'intérieur du modèle
    // pour rendre l'application plus modulaire

    /**
     * Fonction qui permet de récupérer les informations relatives aux développeurs
     * @return array $lesLignes
     */
   

    
}
