-- script d'initialisation de la base de données pour l'application web avec les droits de l'utilisateur
DROP DATABASE IF EXISTS `boucherie`;

CREATE DATABASE IF NOT EXISTS `boucherie` CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE DATABASE IF NOT EXISTS `boucherie` CHARACTER SET utf8 COLLATE utf8_general_ci;

DROP USER IF EXISTS 'JI_Dev_Read'@'%';

CREATE USER 'JI_Dev_Read'@'%' IDENTIFIED BY 'pwdJIPourDev_R';


USE `boucherie`;

DROP USER IF EXISTS 'Agadir'@'%';

CREATE USER 'Agadir'@'%' IDENTIFIED BY 'Agadir';

GRANT ALL PRIVILEGES ON boucherie.* TO 'Agadir'@'%';
FLUSH PRIVILEGES;

DROP USER IF EXISTS 'SIO2'@'%';

CREATE USER 'SIO2'@'%' IDENTIFIED BY 'SIO2';

