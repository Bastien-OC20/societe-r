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


# creation entity  WorkStation with relation ManyToOne

1 step: git pull origin main

2 step : creation of database : symfony console d:d:c
if problem : delete base : symfony console d:d:d --force

3 step : update ddb structure : symfony console doctrine:migrations:migrate

4 step : generation of the entity : symfony console make:entity WorkStation
we need to customize primary key :
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy:"NONE")]
    #[ORM\Column(type: 'string', length: 50)]
    private string $code;


5 step : symfony console make:migration

6 step : symfony console doctrine:migrations:migrate

7 step : git add . and git commit -m ""

8 step : creation of crud : symfony console make:admin:crud and mapping to the entity WorkStation

9 step : symfony console make:admin:crud 
for Category entity

10 step : in Admin\DashboardController.php :
    yield MenuItem::linkToCrud('Workstation', 'fas fa-comments', WorkStation::class);
    yield MenuItem::linkToCrud('Category', 'fas fa-comments', Category::class);

11 step : Update Category entity and add :
    public function __toString()
    {
    return $this->getName();
    }

# Up project

# API Routes

## Workteam
best salary 
/api/workteam/best-salary
