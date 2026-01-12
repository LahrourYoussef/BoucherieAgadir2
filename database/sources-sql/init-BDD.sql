-- script d'initialisation de la base de données pour l'application web avec les droits de l'utilisateur
DROP DATABASE IF EXISTS `tp_sio2_bdjourneeintegration`;

CREATE DATABASE IF NOT EXISTS `tp_sio2_bdjourneeintegration` CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE DATABASE IF NOT EXISTS `tp_sio2_bdjourneeintegration` CHARACTER SET utf8 COLLATE utf8_general_ci;

DROP USER IF EXISTS 'JI_Dev_Read'@'%';

CREATE USER 'JI_Dev_Read'@'%' IDENTIFIED BY 'pwdJIPourDev_R';


USE `tp_sio2_bdjourneeintegration`;

DROP USER IF EXISTS 'Agadir'@'%';

CREATE USER 'Agadir'@'%' IDENTIFIED BY 'Agadir';

DROP USER IF EXISTS 'SIO2'@'%';

CREATE USER 'SIO2'@'%' IDENTIFIED BY 'SIO2';

