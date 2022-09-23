#!/bin/sh

# emplacement des backups
DIR=/media/pi/BACKUPDISK/backup

# calcule date du jour+heure+minutes
DATE=`date "+%Y-%m-%d_%H-%M"`

# crée le dossier pour la backup du jour+heure+minutes
mkdir $DIR/$DATE

# répertoires à sauvegarder
DIRS="/var/www/html"

# les options de la commandes
OPTIONS="-avz"

# on fait le backup
rsync $OPTIONS $DIRS /media/pi/BACKUPDISK/backup/$DATE

# on rajoute des droits au dossier
chmod 777 /media/pi/BACKUPDISK/backup/$DATE
