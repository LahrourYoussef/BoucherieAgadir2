<?php
// Site/Modeles/Produit.php

class Produit
{   
    private int $idProduit;
    private string $nom;
    private string $description;
    private float $prixUnitaire;
    private ?float $prixKG;
    private string $urlPhoto;
    private string $uniteVente;
    private int $idSousCategorie;
    private int $idOrigine;
    private int $idTypeProduit;
    private int $idTypeViande;

    public function __construct(
        int $idProduit, string $nom, string $description, float $prixUnitaire, 
        ?float $prixKG, string $urlPhoto, string $uniteVente, int $idSousCategorie, 
        int $idOrigine, int $idTypeProduit, int $idTypeViande
    ) {
        $this->idProduit = $idProduit;
        $this->nom = $nom;
        $this->description = $description;
        $this->prixUnitaire = $prixUnitaire;
        $this->prixKG = $prixKG;
        $this->urlPhoto = $urlPhoto;
        $this->uniteVente = $uniteVente;
        $this->idSousCategorie = $idSousCategorie;
        $this->idOrigine = $idOrigine;
        $this->idTypeProduit = $idTypeProduit;
        $this->idTypeViande = $idTypeViande;
    }

    // Getters
    public function getIdProduit(): int { return $this->idProduit; }
    public function getNom(): string { return $this->nom; }
    public function getDescription(): string { return $this->description; }
    public function getPrixUnitaire(): float { return $this->prixUnitaire; }
    public function getPrixKG(): ?float { return $this->prixKG; }
    public function getUrlPhoto(): string { return $this->urlPhoto; }
    public function getUniteVente(): string { return $this->uniteVente; }
}