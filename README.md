# CECI EST UN TP CRUD SYMFONY DANS LE CADRE DE MA FORMATION
## Le but est de pratiquer les bases de Symfony en autonomie 

#### 01 | installation Symfony Projet
    • Mise en place du projet
    • Connexion à la base de données

#### 02 | Entités
    • Création de la base de données
    • Création des entités
    • Relations
    • Migrations

#### 03 | Layout
    • Menu principal
    • Layout général

#### 04 | Controllers
    • Controllers
    • Créer les routes nécessaires au CRUD de chaque entité
    • Fixture (1 pilote / 1 qualification)
    • Commencer par le CRUD Qualification
        - liste
        - read
        - create
        - update
        - delete
    • Faire le CRUD pilote
        - liste
        - read
        - create
        - update
        - delete

#### 04.1 | CRUD Qualification
    • Liste des qualifications
        - controller (finall)
        - template twig (héritage de base.html.twig)
            • tableau des qualifications
            • boutons 'Voir', 'Modifier', 'Supprimer'

    •Read
        - controller (utiliser l'id de la route)
        - template twig (héritage de base.html.twig)
            •données d'une qualification
            •bouton retour à la liste

    • Create
        - classe de formulaire
            • contraintes :
                - Code 2 à 8 caractères
                - libellé : 5 caractères mini

        - Controller
            • affichage du formulaire
            • enregistrement en BDD

        - template twig
            • formulaire
            • bouton de retour à la liste
            
    • Update
        - classe de formulaire faite pour Create
        - controller
            • affichage du formulaire
            • enregistrement en BDD
        - template twig
            • formulaire
            • bouton de retour à la liste

    • Delete
        - controller
            • mise à jour BDD
 