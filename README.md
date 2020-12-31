API-NotrePartage
==

L'api permet de gérer la partie back-end de l'application.
Grâce aux méthodes dans l'API l'application pourra fournir des fonctionnalités comme :
   -l'enregistrement des admins
   -l'inscription des bénévoles 
   -...
 
Pour lancer l'API
==

L'API a été crée à l'aide d'API Platform de Symfony .
On utilise Wamp et PhpMyAdmin pour la bdd.

Pour lancer l'api il faut :

1) Cloner le repository:  git clone https://github.com/raphabiz/API-NotrePartage.git
2) Aller sur la branche master
3) Une fois le projet ouvert sur un IDE( PhpStorm ,VSC,Sublime.. ) lancer la commande dans le terminal : composer install
4) Aller sur wamp/xxamp et installer la bdd qui est le .sql "inf1_bdd.sql"
5) Configuer le .env avec vos informations d'utilisateur phpMyadmin
6) Lancer le localhost avec symfony server:start
7) Dans l'url ajouter /api a votre chemin et toutes les apis crées sont affichées .
8) C'est fini l'API est lancée !!
