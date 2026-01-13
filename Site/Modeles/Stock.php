<?php

## Modèle Stock ##

class Stock
{   
    private int $idStock;
    private string $quantiteDisponible;
    private string $seuilAlerte;
    private int $idProduit;

    ## Constructeur ##

    public function __construct(int $idStock, string $quantiteDisponible, string $seuilAlerte, int $idProduit)
    {
        $this->idStock = $idStock;
        $this->quantiteDisponible = $quantiteDisponible;
        $this->seuilAlerte = $seuilAlerte;
        $this->idProduit = $idProduit;
    }


    ## Getters et Setters ##

    public function getIdClient(): int
    {
        return $this->idClient;
    }

    public function setIdClient(int $idClient): void
    {
        $this->idClient = $idClient;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }
}
