# Titre du projet

Application web de **gestion des contacts** permettant à un utilisateur inscrit de gérer une liste privée de contacts via une interface web responsive, développée en PHP 8 procédural, MySQL, HTML5, CSS3/Bootstrap et JavaScript.

## 1. Contexte et objectifs

- Contexte : Projet réalisé pour ConnectSys, une entreprise spécialisée dans les solutions web sécurisées.
- Objectif principal : permettre à un utilisateur de créer un compte, se connecter, puis gérer une liste privée de contacts.
- Périmètre : réalisation des fonctionnalités **obligatoires** (authentification, espace utilisateur, gestion CRUD des contacts, validation client/serveur), certains bonus restant non implémentés.

## 2. Fonctionnalités livrées

- Authentification :
  - Inscription (nom d’utilisateur, Email,  mot de passe, stockage de la date d’inscription).
  - Connexion / déconnexion via sessions PHP.
  - Redirections automatiques selon l’état de connexion (accès à Accueil/Connexion/Inscription redirigé vers Profil si déjà connecté).
- Espace utilisateur :
  - Page Profil avec nom d’utilisateur, date d’inscription, heure de connexion (session), lien vers Contacts.
- Gestion des contacts :
  - Liste des contacts (Nom, Prénom, Téléphone, E-mail, Adresse).
  - Ajout, modification, suppression de contacts.
  - Formulaire en mode création par défaut, bascule en mode mise à jour au clic sur Modifier.
  - Messages adaptés si la liste est vide.
- Frontend :
  - Interface responsive avec HTML5, CSS3 et Bootstrap.
  - Validation des formulaires côté serveur (PHP 8).
  - Interactions dynamiques (modals/alert/feedback utilisateur).

*(Bonus comme recherche d'un contact)*


## 3. Architecture, technologies et UML

- Architecture :
  - PHP 8 procédural (fichiers organisés par responsabilité : pages, logiqueMetier, config, includes).
  - Séparation logique entre présentation (HTML/Bootstrap), traitement (PHP) et accès aux données (SQL).
- Technologies :
  - Backend : PHP 8 procédural, MySQL  avec PDO comme méthode de connexion avec la base de données.
  - Frontend : HTML5, CSS3, Bootstrap, JavaScript (validation, interactions).
  - Gestion de versions : Git/GitHub.
- Base de données :
  - Table `users` pour les utilisateurs.
  - Table `contacts` liée à `users` par une relation 1:N.
- UML :
  - Diagramme de cas d’utilisation : inscription, connexion, gestion des contacts.
  - Diagramme de classes : User, Contact, et les relations entre elles.

## 4. Environnement, installation et exécution

### Prérequis

- Serveur web avec PHP 8 (environnement type WAMP).
- MySQL .
- Navigateur moderne (Chrome).

### Installation

1. Cloner le dépôt GitHub :
git clone <https://github.com/n1o2h/GestionDesContacts>

2. Copier le projet dans le dossier de votre serveur web ( `www`).
3. Configurer les paramètres de connexion à la base (fichier `connexion.php` par exemple : host, user, password, dbname).
5. Vérifier les droits d’accès et la configuration de PHP (sessions activées, extension PDO).

### Exécution

- Accéder à la page d’accueil via :
- `http://localhost/gestion-contacts/pages/index.php` (La page d'accueil).
- Créer un compte via la page d’inscription, ou bien se connecter si tu a deja un compte .
- Naviguer entre Profil et Contacts pour utiliser les fonctionnalités.


## 5. Planification et gestion de projet (Jira)

- Gestion de projet réalisée avec Jira :
- Définition de user stories (authentification, gestion de contacts, validation, etc.).
- Découpage en tâches et sous-tâches techniques (UML, BD, pages PHP, validations, CRUD).
- Organisation en sprint de 7 jours avec suivi quotidien (To Do, In Progress, Done).
- Un lien vers le tableau Jira : <https://ucd-team-h8j1eg7j.atlassian.net/jira/software/projects/SCRUM/boards/1>

## 6. Qualité, sécurité et performance

- Performance :
- Navigation fluide et temps de réponse adaptés au contexte de l’application.
- Sécurité :
- Requêtes préparées (prepared statements) pour prévenir les injections SQL.
- Validation et assainissement des données côté serveur.
- Bonnes pratiques PHP procédural :
- Respect du principe DRY (factorisation des fonctions communes).
- Modularité : fichiers séparés (config, connexion BD, fonctions utilitaires, pages).
- Conventions de nommage claires et commentaires pertinents pour la maintenance.
- Gestion des erreurs :
- Messages d’erreur utilisateur compréhensibles.
- Gestion des erreurs serveur et BD sans divulgation d’informations sensibles.

## 7. Tests et validation

- Tests fonctionnels :
- Inscription, connexion, déconnexion.
- Ajout, modification, suppression de contacts.
- Validation des formulaires (serveur).
- Vérifications :
- Respect des contraintes sur les champs (longueur, format email, caractères autorisés pour le téléphone, etc.).
- Respect des règles de navigation (redirections selon l’état de connexion).

## 8. Limitations et améliorations possibles

- Fonctionnalités non implémentées :
- Pagination/tri des listes.
- Upload de photo de profil.
- Export CSV, notifications, confirmation via modals, dark/light mode.
- Évolutions possibles :
- Passage à une architecture orientée objet.
- Ajout de tests automatisés (PHPUnit, tests E2E).
- Renforcement de la sécurité .

## 9. Auteurs et liens

- Auteur : *Nohaila ait hammad* – Apprennant 1 ere année à YOUCODE COMPUS YOUSOUFIA.

- Liens livrables : 
- Lien GitHub du projet : <https://github.com/n1o2h/GestionDesContacts>
- Lien Jira : <https://ucd-team-h8j1eg7j.atlassian.net/jira/software/projects/SCRUM/boards/1>.
- Lien vers les diagrammes UML : <https://convert.diagrams.net/node/export>.