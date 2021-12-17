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

    symfony composer install
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

# creation fixtures

1 step :  symfony composer req orm-fixtures --dev

2 step : in DataFixtures
public function __construct(private PasswordHasherFactoryInterface $hasherFactory)
{

    }
    public function load(ObjectManager $manager): void
    {
        $admin1 = new User();
        $admin1->setRoles(['ROLE_ADMIN']);
        $admin1->setEmail('admin@gmail.com');
        $admin1->setEnable('true');
        $admin1->setPassword($this->hasherFactory->getPasswordHasher(User::class)->hash('admin', null));

        $manager->persist($admin1);

        $manager->flush();
    }

3 step : launch fixtures :
    symfony console doctrine:fixtures:load

4 step : realise migrations

# modify entity user and creation adminFixtures

1 step : modification of User entity : 
modify $email; $password; $enable; $roles 
respect of abstract method ex: username(); eraseCredentials(); getSalt();

2. step generate getters and setters

3. step execution of migrations

#creation of authentification form

1 step : symfony console make:auth

2 step : in AppAuthenticator.php : modify the class : add and delete the exception

first modification : public function authenticate(Request $request): Passport
{
$email= $request->request->get('email', '');

second modification : return new RedirectResponse($this->urlGenerator->generate('admin'));

3 step : modify security.yaml
access_control:
- { path: ^/admin, roles: ROLE_ADMIN }
- { path: ^/profile, roles: ROLE_USER }

4 step in SecurityController add:

         if ($this->getUser()) {
             return $this->redirectToRoute('homepage');
         }

5 modifictaion of template security\login replace uuid by email in our case


# Up project

# API Routes

## Workteam
best salary 
/api/workteam/best-salary
