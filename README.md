Voici le lien du github pour pouvoir télécharger le projet de Memory:
https://github.com/Wilmaxys/MemoryIIA

Pour vous évitez des problèmes de mise en route en local je l'ai hébergé sur un serveur perso.
http://memory.bragot.fr/
Il existe un compte pour test: demo/demo mais vous pouvez également vous inscrire. Les mots de passes sont cryptés et aucun soucis de sécurité de côté.

Si vous voulez le faire tourner en local normalement il vous suffit d'avoir:
- Npm
- Composer
- Mysql ou un fork

Il vous faut créer une bdd et la lié dans le fichier .env

Ensuite vous devez simplement l'extraire dans votre serveur local et lancer ces commandes
- Composer install
- Npm install
- php bin/console doctrine:fixtures:load ou éxécuter le script sql présent dans le dossier
- npm run build

Normalement tout fonctionnera corr
