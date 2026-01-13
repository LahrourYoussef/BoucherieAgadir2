<?php

## Modèle Produit ##

class Produit
{   
    private int $idProduit;
    private string $nom;
    private string $description;
    private string $categorie;
    private int $prixKG;
    private string $unite;
    private string $poids;  
    private string $prix;
    private string $quantite;
    private string $photo;
    private string $allergenes;


    ## Constructeur ##

    public function __construct(int $idProduit, string $nom, string $description, string $categorie
    , int $prixKG, string $unite, string $poids, string $prix, string $quantite, string $photo, string $allergenes)
    {
        $this->idProduit = $idProduit;
        $this->nom = $nom;
        $this->description = $description;
        $this->categorie = $categorie;
        $this->prixKG = $prixKG;
        $this->unite = $unite;
        $this->poids = $poids;
        $this->prix = $prix;
        $this->quantite = $quantite;
        $this->photo = $photo;
        $this->allergenes = $allergenes;
    }

    ## Getters et Setters ##

    public function getIdProduit(): int
    {
        return $this->idProduit;
    }

    public function setIdProduit(int $idProduit): void
    {
        $this->idProduit = $idProduit;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCategorie(): string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): void
    {
        $this->categorie = $categorie;
    }

    public function getPrixKG(): int
    {
        return $this->prixKG;
    }

    public function setPrixKG(int $prixKG): void
    {
        $this->prixKG = $prixKG;
    }

    public function getUnite(): string
    {
        return $this->unite;
    }

    public function setUnite(string $unite): void
    {
        $this->unite = $unite;
    }

    public function getPoids(): string
    {
        return $this->poids;
    }

    public function setPoids(string $poids): void
    {
        $this->poids = $poids;
    }

    public function getPrix(): string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): void
    {
        $this->prix = $prix;
    }

    public function getQuantite(): string
    {
        return $this->quantite;
    }

    public function setQuantite(string $quantite): void
    {
        $this->quantite = $quantite;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }

    public function getAllergenes(): string
    {
        return $this->allergenes;
    }

    public function setAllergenes(string $allergenes): void
    {
        $this->allergenes = $allergenes;
    }

}
