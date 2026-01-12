#!/bin/bash
# Script pour démarrer les serveurs PHP et MariaDB

############################
# Variables de configuration
############################
WEB_DIR="site"
DOC_DIR="documentation"
PHPMYADMIN_DIR="../../usr/src/phpmyadmin"

############################
# Préparation de MariaDB
############################
if [ ! -d /run/mysqld ]; then
    echo "Création du répertoire /run/mysqld..."
    sudo mkdir -p /run/mysqld
    sudo chown mysql:mysql /run/mysqld
fi

echo "Démarrage du service MariaDB..."
sudo service mariadb start

############################
# Fonction : vérifier si un port est utilisé
############################
is_port_in_use() {
    lsof -i:$1 > /dev/null 2>&1
    return $?
}

############################
# Serveur PHP - Site web
############################
WEB_PORT=8000
if is_port_in_use $WEB_PORT; then
    echo "Le serveur web est déjà actif sur le port $WEB_PORT"
else
    echo "Démarrage du serveur web sur http://localhost:$WEB_PORT"
    php -S 0.0.0.0:$WEB_PORT -t "$WEB_DIR" &
fi

############################
# Serveur PHP - Documentation
############################
DOC_PORT=8001
if is_port_in_use $DOC_PORT; then
    echo "Le serveur documentation est déjà actif sur le port $DOC_PORT"
else
    echo "Démarrage du serveur documentation sur http://localhost:$DOC_PORT"
    php -S 0.0.0.0:$DOC_PORT -t "$DOC_DIR" &
fi

############################
# Serveur PHP - phpMyAdmin
############################
PHPMYADMIN_PORT=8080
if is_port_in_use $PHPMYADMIN_PORT; then
    echo "phpMyAdmin est déjà actif sur le port $PHPMYADMIN_PORT"
else
    echo "Démarrage de phpMyAdmin sur http://localhost:$PHPMYADMIN_PORT"
    php -S 0.0.0.0:$PHPMYADMIN_PORT -t "$PHPMYADMIN_DIR" &
fi

echo "Tous les services sont démarrés ✅"
