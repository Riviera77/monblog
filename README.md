# 📝 monblog — Blog personnel développé avec Laravel 12

monblog est une application web de type blog permettant à une autrice de publier des articles, et aux utilisateurs connectés de les consulter, commenter et noter.  
Le projet a été développé dans un environnement entièrement conteneurisé (Laravel Sail), avec un front-end moderne basé sur Blade, Tailwind CSS et Vite.

---

## 🚀 Fonctionnalités principales

- Création, édition, suppression et publication d’articles (rôle administratrice)
- Consultation des articles pour tous les utilisateurs
- Ajout de commentaires et de notes (utilisateurs connectés)
- Système de rôles : **admin** / **user**
- Authentification (Laravel Breeze)
- Messages flash sécurisés (Blade + sessions)
- Responsive design complet (Tailwind + mobile-first)
- Appels asynchrones grâce à `fetch()` pour mise à jour dynamique d’éléments UI

---

## 🧰 Stack technique

### **Backend**
- PHP 8.2
- Laravel 12 (Blade, Eloquent ORM, Middlewares, Policies)
- Laravel Breeze (authentification)
- PostgreSQL (via Sail et en production)

### **Frontend**
- Blade (templates)
- Tailwind CSS
- Alpine.js
- Vite (compilation front)

### **Environnement & DevOps**
- Docker + Laravel Sail (Nginx, PHP-FPM, PostgreSQL, Redis, Mailpit)
- Git & GitHub (GitFlow)
- Déploiement sur Heroku via `Dockerfile` + `heroku.yml`
- Variables d’environnement sécurisées (`APP_KEY`, `DB_URL`, etc.)

---

## 🛠 Installation (en local avec Sail)

### Cloner le projet
```bash
git clone https://github.com/Riviera77/monblog.git
cd monblog
### 2. Installer les dépendances PHP
```bash
composer install
### 3. Installer Laravel Sail (si non présent)
```bash
php artisan sail:install
### 4. Lancer les conteneurs Docker
```bash
./vendor/bin/sail up -d
### 5. Installer les dépendances front-end
```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
### 6. Générer la clé de l'application
```bash
./vendor/bin/sail artisan key:generate
### 7. Exécuter les migrations
```bash
./vendor/bin/sail artisan migrate



