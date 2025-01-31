<div align="center">
  <a href="https://github.com/cegepmatane/devoir-ajax-2023-GalahadIII">
    <img src="assets/wow-classes-101.png" alt="Logo" width="402" height="226">
  </a>
</div>

<div align="center">
<h1 align="center">WoW Classes 101</h1>

  <p align="center">
  par : Raphaël Lévesque
  </p>
</div>

## 📌 Description

Ce projet permet de récupérer et d'afficher les données du jeu World of Warcraft en utilisant l'API Blizzard. Il inclut un système de cache en PHP pour optimiser les performances et des endpoints exposant les données en JSON, consommées ensuite par une interface JavaScript. Les utilisateurs peuvent consulter des informations détaillées sur les classes, spécialisations et races jouables du jeu, avec des images associées.


## 🛠 Technologies utilisées

Backend :

    PHP : Gestion des DAO, système de cache, et endpoints API
    OAuth 2.0 : Authentification avec l’API Blizzard
    JSON : Format des données renvoyées par l’API

Frontend :

    JavaScript : Récupération et affichage des données via requêtes API avec ajax en utilisant XMLHttpRequest 
    HTML/CSS : Structure et mise en page de l’application

Autres :

    API Blizzard : Source des données du jeu
    GitHub : Gestion du code et des issues


## 🚀 Installation et configuration

Prérequis :

    PHP 8+
    Un serveur web local (Apache, Nginx)
    Composer (si des dépendances sont gérées avec)
    Une clé API Blizzard (OAuth)

Étapes d’installation :

Cloner le repo :
```bash
git clone https://github.com/wow-classes-101
cd ton-repo
```
Configurer les variables d’environnement :

Créer un fichier .env avec les informations suivantes :
```bash
    BLIZZARD_CLIENT_ID=ton_id
    BLIZZARD_CLIENT_SECRET=ton_secret
    CACHE_EXPIRATION=3600
    REGION=us
    LOCALE=en-US
```
Démarrer un serveur local :
```bash
    php -S localhost:8000

    Tester les endpoints avec Postman ou un navigateur
```
## 🔥 Fonctionnalités

✅ Connexion à l’API Blizzard via OAuth 2.0

✅ Récupération des données des races, classes et spécialisations

✅ Gestion d’un cache en PHP pour optimiser les performances

✅ API REST en PHP exposant les données en JSON

✅ Interface en JavaScript affichant les informations en temps réel


## 📖 Endpoints disponibles
Méthode	Endpoint	Description
- GET	/api/classes	Retourne la liste des classes
- GET	/api/races	Retourne la liste des races
- GET	/api/specialisations	Retourne les spécialisations

## 👥 Contributeurs

    Raphaël Lévesque - Développeur principal

## 📝 Licence

Ce projet est sous licence MIT.

