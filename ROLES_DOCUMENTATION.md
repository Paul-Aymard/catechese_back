# Système de Gestion des Rôles - Catéchèse

## Vue d'ensemble

L'application dispose d'un système de contrôle d'accès basé sur trois rôles principaux:

1. **ROLE_ADMINISTRATEUR** - Administrateur de l'application
2. **ROLE_CATECHISTE** - Catéchiste (enseignant)
3. **ROLE_CATECHUMENE** - Catéchumène (étudiant)

## Architecture de Sécurité

### Fichier de Configuration Principal
`config/packages/security.yaml`

Ce fichier configure:
- Les fournisseurs d'utilisateurs (entité User)
- Les pare-feu (authentification formulaire)
- Le contrôle d'accès aux routes

### Rôles et Routes Protégées

| Route | Rôle Requis | Description |
|-------|-------------|-------------|
| `/admin/*` | ROLE_ADMINISTRATEUR | Tableau de bord administrateur |
| `/catechiste/*` | ROLE_CATECHISTE | Tableau de bord catéchiste |
| `/catechumene/*` | ROLE_CATECHUMENE | Tableau de bord catéchumène |
| `/dashboard` | ROLE_USER | Redirection intelligente selon le rôle |
| `/login` | PUBLIC_ACCESS | Formulaire de connexion |
| `/register` | PUBLIC_ACCESS | Formulaire d'inscription |
| `/logout` | PUBLIC_ACCESS | Déconnexion |

## Flux d'Authentification

```
1. Utilisateur accède à /login
2. Entre email et mot de passe
3. Système vérifie les credentials
4. Si valide → Redirection vers /dashboard
5. DashboardController analyse les rôles
6. Redirection vers le bon dashboard:
   - ROLE_ADMINISTRATEUR → /admin/dashboard
   - ROLE_CATECHISTE → /catechiste/dashboard
   - ROLE_CATECHUMENE → /catechumene/dashboard
```

## Gestion des Rôles

### Lors de l'Inscription

Le formulaire d'enregistrement (`register.html.twig`) permet à l'utilisateur de sélectionner son rôle:

```html
<!-- Choix du rôle -->
- Administrateur
- Catéchiste
- Catéchumène
```

### Attribution de Rôles via Commande

Vous pouvez assigner ou supprimer des rôles via la ligne de commande:

#### Assigner un rôle
```bash
php bin/console app:user:assign-role user@example.com ROLE_ADMINISTRATEUR
```

#### Supprimer un rôle
```bash
php bin/console app:user:assign-role user@example.com ROLE_CATECHISTE --remove
```

## Fichiers Clés

### Controllers
- `src/Controller/SecurityController.php` - Gestion authentification/déconnexion
- `src/Controller/DashboardController.php` - Redirection selon les rôles
- `src/Controller/RegistrationController.php` - Inscription utilisateur

### Formulaires
- `src/Form/RegistrationFormType.php` - Formulaire d'inscription avec sélection de rôle

### Entités
- `src/Entity/User.php` - Entité utilisateur avec gestion des rôles

### Templates
- `templates/dashboard/admin.html.twig` - Dashboard administrateur
- `templates/dashboard/catechiste.html.twig` - Dashboard catéchiste
- `templates/dashboard/catechumene.html.twig` - Dashboard catéchumène

### Commandes
- `src/Command/AssignRoleCommand.php` - Commande pour attribuer des rôles

## Exemples d'Utilisation

### Créer un administrateur
```bash
# 1. S'inscrire (si possible) ou ajouter manuellement dans la BD
# 2. Assigner le rôle administrateur
php bin/console app:user:assign-role admin@catechese.com ROLE_ADMINISTRATEUR
```

### Vérifier les accès
Une fois connecté, l'utilisateur est automatiquement redirigé vers son dashboard approprié selon le rôle le plus élevé.

## Sécurité

- Les routes protégées nécessitent une authentification
- Les utilisateurs sans les rôles requis reçoivent une erreur 403 (Forbidden)
- Les rôles sont stockés en base de données (table `user`)
- Les mots de passe sont hashés avec l'algorithme standard Symfony

## Modifications Futures

Pour ajouter d'autres rôles:

1. Ajouter le rôle dans `security.yaml` → `access_control`
2. Ajouter les choix dans `RegistrationFormType.php`
3. Ajouter les routes de contrôleurs appropriées
4. Créer les templates correspondants
