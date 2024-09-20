# CarePulse

CarePulse est une application de gestion de rendez-vous médicaux développée en PHP natif. Elle permet aux utilisateurs de s'enregistrer, de remplir un formulaire d'information patient, et de prendre des rendez-vous avec des médecins. Une interface administrateur est fournie pour gérer les patients, les médecins et les rendez-vous.

## Fonctionnalités

- **Inscription des Utilisateurs** : Les utilisateurs peuvent s'inscrire avec leurs informations personnelles.
- **Formulaire d'Information du Patient** : Après inscription, les utilisateurs peuvent remplir un formulaire médical avec leurs informations de santé.
- **Prise de Rendez-vous** : Les patients peuvent consulter les disponibilités des médecins et réserver des rendez-vous en ligne.
- **Interface Administrateur** : Les administrateurs peuvent gérer les patients, les médecins et les rendez-vous via un tableau de bord intuitif.

## Architecture de l'Application

La structure des fichiers de l'application est organisée comme suit :

```bash
/carepulse
├── /admin
│   ├── dashboard.php          # Tableau de bord pour les administrateurs
│   ├── manage_patients.php    # Gestion des patients
│   ├── manage_doctors.php     # Gestion des médecins
│   └── manage_appointments.php # Gestion des rendez-vous
├── /user
│   ├── register.php           # Page d'inscription
│   ├── patient_form.php       # Formulaire d'information patient
│   ├── appointment.php        # Prise de rendez-vous
│   └── confirmation.php       # Confirmation de rendez-vous
├── /includes
│   ├── config.php             # Configuration de l'application
│   ├── db.php                 # Connexion à la base de données
│   └── functions.php          # Fonctions utilitaires
└── index.php                  # Page d'accueil de l'application
```

## Prérequis

Avant de commencer, assurez-vous d'avoir installé :

- Un serveur web (Apache, Nginx, etc.)
- PHP 7.4 ou supérieur
- MySQL ou tout autre système de gestion de base de données compatible
- Un serveur local (ex : XAMPP, WAMP)

## Installation

Pour installer CarePulse, suivez les étapes ci-dessous :

1. **Cloner le dépôt :**

   ```bash
   git clone <URL_DU_DEPOT>
   ```

   ```bash
   cd carepulse
   ```

2. **Configurer la base de données :**

- Créez une base de données MySQL pour l'application.
- Modifiez le fichier `includes/config.php` et entrez vos informations de connexion à la base de données (nom d'utilisateur, mot de passe, nom de la base de données).

3. **Importer la structure de la base de données :**

- Importez le fichier SQL contenant la structure et les tables dans votre base de données. (Un fichier `carepulse.sql` doit être fourni avec l'application).

4. **Démarrer le serveur web :**

- Si vous utilisez un serveur local comme XAMPP ou WAMP, démarrez Apache et MySQL.
