# Brief - Musicode

Vous avez été contactés par une petite start-up musicale qui souhaite lancer son application web nommée Musicode.
Le concept est simple : permettre aux utilisateurs d’enregistrer et de gérer leur collection de musiques tout en consultant un catalogue commun de morceaux.
L’équipe a déjà fait appel à un graphiste et dispose de maquettes.
Elle a maintenant besoin de votre expertise technique pour développer un prototype fonctionnel.

## Fonctionnalités

### Compte utilisateur
*   Inscription (nom, prénom, email, mot de passe)
*   Connexion / Déconnexion
*   Modification des informations du compte

**Contraintes**
*   Mots de passe encodés avec `password_hash()`
*   Vérification avec `password_verify()`
*   Champs échappés (`htmlspecialchars()`) et validés côté serveur

### Catalogue de musiques
*   Liste des musiques disponibles
*   Affichage des détails d’une musique (titre, auteur, durée, album)
*   Ajout d’une musique au catalogue (uniquement si connecté)

### Collection personnelle
*   Liste des musiques de l’utilisateur
*   Ajouter une musique depuis la base à sa collection
*   Supprimer une musique de sa collection
*   Noter une musique (0 à 5)

## Pages obligatoires
*   `/login` — Page de connexion
*   `/register` — Page d’inscription
*   `/musics` — Liste des musiques
*   `/musics/{id}` — Détails d’une musique
*   `/library` — Bibliothèque personnelle
*   `/account` — Modification du compte utilisateur

## Prérequis technique
*   La base de donnée doit contenir au moins 3 tables
*   La connexion doit être réalisée avec des sessions PHP, l’utilisateur doit pouvoir se connecter et se déconnecter
*   Plusieurs utilisateurs doivent pouvoir se connecter ! Et chacun a ses propres données de jeu.
*   **Le site ne doit pas contenir de JavaScript.**
*   Les maquettes doivent être respectées.
*   L’architecture du code doit être en MVC
*   Le projet doit utiliser composer.
*   Les variables d’environnements doivent être stockés dans fichier `.env`
*   Le code doit être suivi sur GitHub (ajouter marcelguillaume en owner)
*   Les champs doivent être protégés et échappés
*   Les mots de passes doivent être chiffré dans la base de données
*   **Pas de classes PHP**
*   Le cahier des charges doit être respecté !

## Maquette
https://www.figma.com/design/oszeLtkOGFheVSNiEZWjpn/Musicode?node-id=2466-2&m=dev&t=cIgU4UCNczKWrf2i-1
