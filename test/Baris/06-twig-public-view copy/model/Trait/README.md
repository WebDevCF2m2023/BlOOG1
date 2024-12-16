# Trait Model

Les traits sont des éléments de code réutilisables. Ils permettent d'ajouter des méthodes à une classe sans avoir à l'hériter. Ils sont très utiles pour ajouter des fonctionnalités à une classe sans avoir à l'hériter. Ils permettent d'éviter les problèmes de l'héritage multiple impossible en PHP sans passer par plusieurs parents.

En effet, un seul parent est possible en PHP (un extends). Par contre, on peut utiliser plusieurs traits dans une même classe.

```php
trait A {
    public function a() {
        echo "a";
    }
}
trait B {
    public function b() {
        echo "b";
    }
}
class Test {
    use A, B;
}
$test = new Test();
$test->a(); // affiche "a"
$test->b(); // affiche "b"
```