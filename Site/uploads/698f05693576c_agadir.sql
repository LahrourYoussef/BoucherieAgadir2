-- ==========================================================
-- 1. RÉINITIALISATION DE LA BASE DE DONNÉES
-- ==========================================================
DROP DATABASE IF EXISTS boucherie;
CREATE DATABASE boucherie;
USE boucherie;

-- ==========================================================
-- 2. CRÉATION DES TABLES
-- ==========================================================

CREATE TABLE Client(
   Id_Client INT AUTO_INCREMENT,
   Nom VARCHAR(50),
   Prenom VARCHAR(50),
   Email VARCHAR(50),
   Tel VARCHAR(20) NOT NULL,
   PRIMARY KEY(Id_Client),
   UNIQUE(Email)
);

CREATE TABLE Promotion(
   Id_Promo INT AUTO_INCREMENT,
   Nom_Promo VARCHAR(50),
   Taux_Remise DECIMAL(5,2),
   Date_Debut DATE,
   Date_Fin DATE,
   PRIMARY KEY(Id_Promo)
);

CREATE TABLE Type_Viande(
   Id_Type_Viande INT AUTO_INCREMENT,
   Nom_Type_Viande VARCHAR(50),
   PRIMARY KEY(Id_Type_Viande)
);

CREATE TABLE Type_Produit(
   Id_Type_Produit INT AUTO_INCREMENT,
   Nom_Type_Produit VARCHAR(50),
   PRIMARY KEY(Id_Type_Produit)
);

CREATE TABLE Origine(
   Id_Origine INT AUTO_INCREMENT,
   Pays VARCHAR(50),
   PRIMARY KEY(Id_Origine)
);

CREATE TABLE Label(
   Id_Label INT AUTO_INCREMENT,
   Nom_Label VARCHAR(50),
   PRIMARY KEY(Id_Label)
);

CREATE TABLE Categorie(
   Id_Categorie INT AUTO_INCREMENT,
   Nom_Categorie VARCHAR(50),
   PRIMARY KEY(Id_Categorie)
);

CREATE TABLE Sous_Categorie(
   Id_Sous_Categorie INT AUTO_INCREMENT,
   Nom_Sous_Categorie VARCHAR(50),
   Id_Categorie INT NOT NULL,
   PRIMARY KEY(Id_Sous_Categorie),
   FOREIGN KEY(Id_Categorie) REFERENCES Categorie(Id_Categorie)
);

CREATE TABLE Produit(
   Id_Produit INT AUTO_INCREMENT,
   Nom_Produit VARCHAR(100),
   Description_Produit TEXT,
   Prix_Unitaire DECIMAL(10,2),
   Prix_KG DECIMAL(10,2),
   URL_PHOTO VARCHAR(255),
   Unite_Vente VARCHAR(50),
   Id_Sous_Categorie INT NOT NULL,
   Id_Origine INT NOT NULL,
   Id_Type_Produit INT NOT NULL,
   Id_Type_Viande INT NOT NULL,
   PRIMARY KEY(Id_Produit),
   FOREIGN KEY(Id_Sous_Categorie) REFERENCES Sous_Categorie(Id_Sous_Categorie),
   FOREIGN KEY(Id_Origine) REFERENCES Origine(Id_Origine),
   FOREIGN KEY(Id_Type_Produit) REFERENCES Type_Produit(Id_Type_Produit),
   FOREIGN KEY(Id_Type_Viande) REFERENCES Type_Viande(Id_Type_Viande)
);

CREATE TABLE Commande(
   Id_Commande INT AUTO_INCREMENT,
   Date_Retrait DATETIME,
   Status_Commande VARCHAR(50),
   Total_TTC DECIMAL(10,2),
   Id_Client INT NOT NULL,
   PRIMARY KEY(Id_Commande),
   FOREIGN KEY(Id_Client) REFERENCES Client(Id_Client)
);

CREATE TABLE Stock(
   Id_Stock INT AUTO_INCREMENT,
   Quantite_Disponible INT,
   Seuil_Alerte INT,
   Id_Produit INT NOT NULL,
   PRIMARY KEY(Id_Stock),
   FOREIGN KEY(Id_Produit) REFERENCES Produit(Id_Produit)
);

CREATE TABLE Contient(
   Id_Produit INT,
   Id_Commande INT,
   Quantite DECIMAL(10,2),
   PRIMARY KEY(Id_Produit, Id_Commande),
   FOREIGN KEY(Id_Produit) REFERENCES Produit(Id_Produit),
   FOREIGN KEY(Id_Commande) REFERENCES Commande(Id_Commande)
);

CREATE TABLE Appliquer(
   Id_Produit INT,
   Id_Promo INT,
   PRIMARY KEY(Id_Produit, Id_Promo),
   FOREIGN KEY(Id_Produit) REFERENCES Produit(Id_Produit),
   FOREIGN KEY(Id_Promo) REFERENCES Promotion(Id_Promo)
);

CREATE TABLE Possede(
   Id_Produit INT,
   Id_Label INT,
   PRIMARY KEY(Id_Produit, Id_Label),
   FOREIGN KEY(Id_Produit) REFERENCES Produit(Id_Produit),
   FOREIGN KEY(Id_Label) REFERENCES Label(Id_Label)
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- ==========================================================
-- 3. REMPLISSAGE DES DONNÉES DE RÉFÉRENCE
-- ==========================================================

-- ORIGINES
INSERT INTO Origine (Pays) VALUES 
('France'), ('Espagne'), ('Maroc'), ('Irlande'), 
('Argentine'), ('Belgique'), ('Pays-Bas'), ('Pologne');

-- TYPES DE VIANDE
INSERT INTO Type_Viande (Nom_Type_Viande) VALUES 
('Bœuf'), ('Agneau'), ('Veau'), ('Poulet'), 
('Dinde'), ('Merguez'), ('Saucisse'), ('Abats'),
('Autre');

-- TYPES DE PRODUIT
INSERT INTO Type_Produit (Nom_Type_Produit) VALUES 
('Viandes'), 
('Charcuterie'), 
('Autres');

-- LABELS
INSERT INTO Label (Nom_Label) VALUES 
('Certifié Halal'), ('Label Rouge'), ('Bio (AB)'), 
('Origine France'), ('AOP'), ('IGP');

-- CATÉGORIES
INSERT INTO Categorie (Nom_Categorie) VALUES 
('Boucherie'), ('Volaille'), ('Charcuterie'), ('Épicerie & Divers');

-- SOUS-CATÉGORIES (Basées sur les IDs de catégories ci-dessus)
INSERT INTO Sous_Categorie (Nom_Sous_Categorie, Id_Categorie) VALUES 
('Grillades & Steaks', 1), 
('Rôtis & Pièces à rôtir', 1), 
('Morceaux à mijoter (Bourguignon/Pot-au-feu)', 1),
('Viande hachée & Préparations', 1),
('Abats', 1),
('Blancs & Filets', 2), 
('Cuisses & Pilons', 2), 
('Volailles entières', 2),
('Saucissons & Salaisons', 3), 
('Jambons & Rôtis cuits', 3), 
('Pâtés & Terrines', 3),
('Épices & Condiments', 4), 
('Huiles & Olives', 4),
('Accompagnements', 4);

-- UTILISATEUR ADMIN (Email: admin@agadir.fr | MDP: password)
INSERT INTO users (nom, email, password) 
VALUES ('Administrateur', 'admin@agadir.fr', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');