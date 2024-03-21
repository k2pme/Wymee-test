# wymee frontend and backend test
projet backend et frontend du test mymee

- [Installer](#setup)
- [Description du backend](#Description-Backend)

## Setup

```bash
git clone https://github.com/k2pme/Wymee-test.git  
cd Wymee-test    
```
Placé le projet dans le repertoir htdocs de votre serveur local puis dans votre navigateur entrer  l'adresse 
- **127.0.0.1/Wymee-test/backend** : pour acceder au projet backend 
- **127.0.0.1/Wymee-test/frontend/index.html** : pour acceder au projet frontend

## Description-Backend
    backend/
    ├── articles .sql
    ├── Controlers
    │   ├── create.php
    │   ├── delete.php
    │   ├── read.php
    │   └── update.php
    ├── index.php
    ├── Models
    │   └── Articles.php
    └── Views
        ├── create.html
        ├── delete.html.php
        ├── read.html.php
        └── update.html.php

    4 dossiers, 10 fichiers

    > Controlers : dossier des controler
    > Models : dossier du models Articles
    > Views : dossier des views
    > articles.sql : fichier sql de la table articles
    > index.php : point d'entrer du site