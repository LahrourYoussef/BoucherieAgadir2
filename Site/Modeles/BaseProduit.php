<?php
// Site/Modeles/BaseProduit.php

include_once "BaseDAO.php";
include_once "Produit.php";

class BaseProduitDAO extends BaseDAO
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Définit la connexion selon le rôle (lecture par défaut)
     */
    private function setConnexionSelonRole(string $role = 'role_lecture')
    {
        $this->setConnexionBase(
            $_ENV['local_dsn'], 
            $_ENV[$role], 
            $_ENV['pwd' . $role], 
            $_ENV['options']
        );
    }

    /**
     * Récupère tous les produits de la boucherie
     */
    public function getLesProduits()
    {
        $this->setConnexionSelonRole(); 
        $sql = "SELECT * FROM Produit ORDER BY Nom_Produit ASC";
        $res = $this->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Recherche des produits par mot-clé (nom ou description)
     */
    public function rechercherProduit(string $motCle)
    {
        $this->setConnexionSelonRole();
        
        // Utilisation de l'objet PDO parent ($this->db) pour sécuriser la recherche
        $sql = "SELECT * FROM Produit WHERE Nom_Produit LIKE :cle OR Description_Produit LIKE :cle";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['cle' => "%$motCle%"]);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}