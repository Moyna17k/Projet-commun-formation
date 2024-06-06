# Projet TOURISME :

| Groupe                          | Membres                   |
|---------------------------------|---------------------------|
| **HTML/CSS + Responsive**       | Fatima, Leo, Miriam       |
| **Back-Office Php/Symfony**     | Jérémy, Maxime, Pierre    |
| **Base des Données**            | Antoine, Frédéric, Yoann  |


**Cloner le projet
git clone https://github.com/Moyna17k/tourisme.git

**Se déplacer dans le répertoire du projet
cd tourisme

**Installer les dépendances avec Composer
composer install

**Copier le fichier de configuration d'environnement et le modifier
cp .env.dist .env
nano .env  ( Ou utilisez l'éditeur de votre choix pour modifier le fichier )

**Na pas oublier de faire les migrations
php bin/console doctrine:migration:migrate

**Démarrer le serveur de développement Symfony
symfony serve -d


