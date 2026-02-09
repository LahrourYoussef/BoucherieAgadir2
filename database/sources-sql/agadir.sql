CREATE TABLE Client(
   Id_Client INT AUTO_INCREMENT,
   Nom VARCHAR(50) ,
   Prenom VARCHAR(50) ,
   Email VARCHAR(50) ,
   Tel VARCHAR(20)  NOT NULL,
   PRIMARY KEY(Id_Client),
   UNIQUE(Email)
);

CREATE TABLE Promotion(
   Id_Promo INT AUTO_INCREMENT,
   Nom_Promo VARCHAR(50) ,
   Taux_Remise DECIMAL(5,2)  ,
   Date_Debut DATE,
   Date_Fin DATE,
   PRIMARY KEY(Id_Promo)
);

CREATE TABLE Type_Viande(
   Id_Type_Viande INT AUTO_INCREMENT,
   Nom_Type_Viande VARCHAR(50) ,
   PRIMARY KEY(Id_Type_Viande)
);

CREATE TABLE Type_Produit(
   Id_Type_Produit INT AUTO_INCREMENT,
   Nom_Type_Produit VARCHAR(50) ,
   PRIMARY KEY(Id_Type_Produit)
);

CREATE TABLE Origine(
   Id_Origine INT AUTO_INCREMENT,
   Pays VARCHAR(50) ,
   PRIMARY KEY(Id_Origine)
);

CREATE TABLE Label(
   Id_Label INT AUTO_INCREMENT,
   Nom_Label VARCHAR(50) ,
   PRIMARY KEY(Id_Label)
);

CREATE TABLE Categorie(
   Id_Categorie INT AUTO_INCREMENT,
   Nom_Categorie VARCHAR(50) ,
   PRIMARY KEY(Id_Categorie)
);

CREATE TABLE Sous_Categorie(
   Id_Sous_Categorie INT AUTO_INCREMENT,
   Nom_Sous_Categorie VARCHAR(50) ,
   Id_Categorie INT NOT NULL,
   PRIMARY KEY(Id_Sous_Categorie),
   FOREIGN KEY(Id_Categorie) REFERENCES Categorie(Id_Categorie)
);

CREATE TABLE Produit(
   Id_Produit INT AUTO_INCREMENT,
   Nom_Produit VARCHAR(100) ,
   Description_Produit TEXT,
   Prix_Unitaire DECIMAL(10,2)  ,
   Prix_KG DECIMAL(10,2)  ,
   URL_PHOTO VARCHAR(255) ,
   Unite_Vente VARCHAR(50) ,
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
   Status_Commande VARCHAR(50) ,
   Total_TTC DECIMAL(10,2)  ,
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
   Quantite DECIMAL(10,2)  ,
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