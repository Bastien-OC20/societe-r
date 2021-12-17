# APP Societe R

# install
pour lancer le conteneur : docker-compose up -d

création de la dataBase : symfony console doctrine:database:create

pour voir les variables d'env : symfony var:export --debug -multiline

pour rentrer dans le conteneur : pgcli postgres://symfony:ChangeMe@127.0.0.1:55559/societe-r

il faut bien vérifier le fichier docker-compose.yml et regarder le mot de passe, user et nom de la database sont définis et corrects

pour voir la base de données: \d

pour quitter le conteneur: q+Enter soit ctr+d

pour arrêter le conteneur: docker compose down 

# Up project

# API Routes
## Workteam
best salary 
/api/workteam/best-salary
