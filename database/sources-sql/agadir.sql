USE LaBoucherie;

#------------------------------------------------------------
# Table: Viandes
#------------------------------------------------------------

DROP TABLE IF EXISTS `Viandes`;

CREATE TABLE Viandes (
    id int Auto_increment NOT NULL,
    nom Varchar(20) NOT NULL,
    typeViande Varchar(15) NOT NULL,
    CONSTRAINT Classe_PK PRIMARY KEY (id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3 COLLATE = utf8mb3_general_ci;

INSERT INTO Viandes (nom, typeViande) VALUES
('Entrecôte', 'Boeuf'),
('Côte de boeuf', 'Boeuf'),
('Escalope', 'Poulet'),
('Cuisses', 'Poulet'),
('Côtelettes', 'Agneau'),
('Merguez', 'Mouton');
    

#------------------------------------------------------------
# Table: Stocks
#------------------------------------------------------------
CREATE TABLE Stocks (
    id INT AUTO_INCREMENT NOT NULL,
    viande_id INT NOT NULL,
    quantite INT NOT NULL,
    CONSTRAINT Stocks_PK PRIMARY KEY (id),
    CONSTRAINT Stocks_Viandes_FK FOREIGN KEY (viande_id)
        REFERENCES Viandes(id)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


#------------------------------------------------------------
# Données de départ
#------------------------------------------------------------
INSERT INTO Stocks (viande_id, quantite) VALUES
(1, 25),
(2, 10),
(3, 40);




#------------------------------------------------------------
# Habilitations
#------------------------------------------------------------
GRANT SELECT ON `LaBoucherie`.`Viandes` TO 'Agadir'@'%';
GRANT SELECT,DELETE ON `LaBoucherie`.`Viandes` TO 'SIO2'@'%';
GRANT SELECT ON `LaBoucherie`.`Stocks` TO 'Agadir'@'%';
GRANT INSERT ON `LaBoucherie`.`Stocks` TO 'SIO2'@'%';

