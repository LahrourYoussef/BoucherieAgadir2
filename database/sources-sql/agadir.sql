-- ----------------------------
-- Table: Client
-- ----------------------------
CREATE TABLE Client (
  Id_Client INT NOT NULL,
  Nom VARCHAR(50) NOT NULL,
  Prenom VARCHAR(50) NOT NULL,
  Tel VARCHAR(20),
  Email VARCHAR(100) NOT NULL UNIQUE, -- Ajout de UNIQUE pour ton portfolio
  CONSTRAINT Client_PK PRIMARY KEY (Id_Client)
) ENGINE=InnoDB;

-- ----------------------------
-- Table: Promotion
-- ----------------------------
CREATE TABLE Promotion (
  Id_Promo INT NOT NULL,
  Nom_Promo VARCHAR(50) NOT NULL,
  Taux_Remise DECIMAL(5,2) NOT NULL,
  Date_Debut DATE NOT NULL,
  Date_Fin DATE NOT NULL,
  CONSTRAINT Promotion_PK PRIMARY KEY (Id_Promo)
) ENGINE=InnoDB;

-- ----------------------------
-- Table: Produit
-- ----------------------------
CREATE TABLE Produit (
  Id_Produit INT NOT NULL,
  Nom_Produit VARCHAR(100) NOT NULL,
  Description TEXT,
  Prix_Unitaire DECIMAL(10,2) NOT NULL,
  Quantite VARCHAR(50),
  Photo VARCHAR(255),
  Allergenes VARCHAR(255),
  Categorie VARCHAR(50) NOT NULL,
  TypeViande VARCHAR(50) NOT NULL,
  Unite_Mesure DECIMAL(10,2) NOT NULL,
  Origine VARCHAR(50) NOT NULL,
  Prix_KG DECIMAL(10,2) NOT NULL,
  Label VARCHAR(5) NOT NULL,
  CONSTRAINT Produit_PK PRIMARY KEY (Id_Produit)
) ENGINE=InnoDB;

-- ----------------------------
-- Table: Commande
-- ----------------------------
CREATE TABLE Commande (
  Id_Commande INT NOT NULL,
  Date_retrait DATE NOT NULL,
  Heure_retrait TIME NOT NULL,
  Status_Commande VARCHAR(30) NOT NULL,
  Total_TTC DECIMAL(10,2) NOT NULL,
  Id_Client INT NOT NULL,
  CONSTRAINT Commande_PK PRIMARY KEY (Id_Commande),
  CONSTRAINT Commande_Id_Client_FK FOREIGN KEY (Id_Client) REFERENCES Client (Id_Client)
) ENGINE=InnoDB;

-- ----------------------------
-- Table: Appliquer
-- ----------------------------
CREATE TABLE Appliquer (
  Id_Promo INT NOT NULL,
  Id_Produit INT NOT NULL,
  CONSTRAINT Appliquer_PK PRIMARY KEY (Id_Promo, Id_Produit),
  CONSTRAINT Appliquer_Id_Promo_FK FOREIGN KEY (Id_Promo) REFERENCES Promotion (Id_Promo),
  CONSTRAINT Appliquer_Id_Produit_FK FOREIGN KEY (Id_Produit) REFERENCES Produit (Id_Produit)
) ENGINE=InnoDB;

-- ----------------------------
-- Table: Stock
-- ----------------------------
CREATE TABLE Stock (
  Id_Stock INT NOT NULL,
  Quantite_Disponible DECIMAL(10,2) NOT NULL, -- Changé en DECIMAL pour le poids
  Seuil_alerte DECIMAL(10,2) NOT NULL,      -- Changé en DECIMAL pour le poids
  Id_Produit INT NOT NULL,
  CONSTRAINT Stock_PK PRIMARY KEY (Id_Stock),
  CONSTRAINT Stock_Id_Produit_FK FOREIGN KEY (Id_Produit) REFERENCES Produit (Id_Produit)
) ENGINE=InnoDB;

-- ----------------------------
-- Table: Contient
-- ----------------------------
CREATE TABLE Contient (
  Id_Commande INT NOT NULL,
  Id_Produit INT NOT NULL,
  Quantite DECIMAL(10,2) NOT NULL,
  CONSTRAINT Contient_PK PRIMARY KEY (Id_Commande, Id_Produit),
  CONSTRAINT Contient_Id_Commande_FK FOREIGN KEY (Id_Commande) REFERENCES Commande (Id_Commande),
  CONSTRAINT Contient_Id_Produit_FK FOREIGN KEY (Id_Produit) REFERENCES Produit (Id_Produit)
) ENGINE=InnoDB;