USE BoucherieAgadir;

-- ----------------------------
-- Table: Client
-- ----------------------------
CREATE TABLE Client (
  Id INT NOT NULL,
  Nom VARCHAR(50) NOT NULL,
  Prenom VARCHAR(50) NOT NULL,
  Tel VARCHAR(20),
  Email VARCHAR(100) NOT NULL,
  CONSTRAINT Client_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


-- ----------------------------
-- Table: Stock
-- ----------------------------
CREATE TABLE Stock (
  Id INT NOT NULL,
  Quantite_disponible INT NOT NULL,
  Seuil_alerte INT NOT NULL,
  CONSTRAINT Stock_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


-- ----------------------------
-- Table: Produit
-- ----------------------------
CREATE TABLE Produit (
  Id INT NOT NULL,
  Nom VARCHAR(100) NOT NULL,
  Description TEXT,
  Prix DECIMAL(10,2) NOT NULL,
  Quantite VARCHAR(50),
  Photo VARCHAR(255),
  Allergenes VARCHAR(255),
  CONSTRAINT Produit_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


-- ----------------------------
-- Table: Commande
-- ----------------------------
CREATE TABLE Commande (
  Id INT NOT NULL,
  Date_retrait DATE NOT NULL,
  Heure_retrait TIME NOT NULL,
  Status VARCHAR(30) NOT NULL,
  Total DECIMAL(10,2) NOT NULL,
  Id_Client INT NOT NULL,
  CONSTRAINT Commande_PK PRIMARY KEY (Id),
  CONSTRAINT Commande_Id_Client_FK FOREIGN KEY (Id_Client) REFERENCES Client (Id)
)ENGINE=InnoDB;


-- ----------------------------
-- Table: Contient
-- ----------------------------
CREATE TABLE Contient (
  Id INT NOT NULL,
  Id_Produit INT NOT NULL,
  Quantite INT NOT NULL,
  CONSTRAINT Contient_PK PRIMARY KEY (Id, Id_Produit),
  CONSTRAINT Contient_Id_FK FOREIGN KEY (Id) REFERENCES Commande (Id),
  CONSTRAINT Contient_Id_Produit_FK FOREIGN KEY (Id_Produit) REFERENCES Produit (Id)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Données de départ
#------------------------------------------------------------
INSERT INTO Stocks (viande_id, quantite) VALUES
(1, 25),
(2, 10),
(3, 40);




#------------------------------------------------------------
# Habilitations ( à refaire)
#------------------------------------------------------------
GRANT SELECT ON `BoucherieAgadir`.`Viandes` TO 'Agadir'@'%';
GRANT SELECT,DELETE ON `BoucherieAgadir`.`Viandes` TO 'SIO2'@'%';
GRANT SELECT ON `BoucherieAgadir`.`Stocks` TO 'Agadir'@'%';
GRANT INSERT ON `BoucherieAgadir`.`Stocks` TO 'SIO2'@'%';

