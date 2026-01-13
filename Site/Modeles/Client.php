<?php

## Modèle Client ##

class Client
{   
    private int $idClient;
    private string $nom;
    private string $prenom;
    private string $mail;
    private string $telephone;

    ## Constructeur ##

    public function __construct(int $idClient, string $nom, string $prenom, string $mail, string $telephone)
    {
        $this->idClient = $idClient;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->telephone = $telephone;
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
