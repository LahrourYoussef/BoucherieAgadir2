<?php

## Modèle Commande ##

class Commande
{   
    private int $idCommande;
    private string $dateRetrait;
    private string $heureRetrait;
    private string $statut;
    private string $total;

    ## Constructeur ##

    public function __construct(int $idCommande, string $dateRetrait, string $heureRetrait, string $statut, string $total)
    {
        $this->idCommande = $idCommande;
        $this->dateRetrait = $dateRetrait;
        $this->heureRetrait = $heureRetrait;
        $this->statut = $statut;
        $this->total = $total;
    }   
   

    ## Getters et Setters ##

    public function getIdCommande(): int
    {
        return $this->idCommande;
    }
    
    public function setIdCommande(int $idCommande): void
    {
        $this->idCommande = $idCommande;
    }
    public function getDateRetrait(): string
    {
        return $this->dateRetrait;
    }
    public function setDateRetrait(string $dateRetrait): void
    {
        $this->dateRetrait = $dateRetrait;              
    }
    public function getHeureRetrait(): string
    {
        return $this->heureRetrait;
    }
    public function setHeureRetrait(string $heureRetrait): void
    {
        $this->heureRetrait = $heureRetrait;
    }
    public function getStatut(): string
    {
        return $this->statut;
    }
    public function setStatut(string $statut): void
    {
        $this->statut = $statut;
    }
    public function getTotal(): string
    {
        return $this->total;
    }
    public function setTotal(string $total): void
    {
        $this->total = $total;
    }
}