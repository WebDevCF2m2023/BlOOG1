# Abstract Model


Les modèles abstraits sont des classes de base pour tous les modèles. Ils fournissent une interface commune à tous les modèles à implémenter.

On ne peut pas instancier un modèle abstrait. Les classes enfants, appelées par `extends`, doivent implémenter les méthodes abstraites.

Les classes enfants peuvent hériter, donc surcharger ou supprimer, les méthodes non abstraites, les propriétés et les constantes.
