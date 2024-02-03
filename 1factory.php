<?php
//on définit une interface pour instancier des classes
//un magasin vend des vêtements, des télévisions, des oranges
//on crée une interface IProduct, les classes qui l'implémentent ont une fonction commune : getPrice pour donner le prix.
//Ensuite on crée une classe contenant des méthodes statiques pour instancier les classes clothing, TV
//avantages: éviter d'instancier les classes partout et facile de modifier l'instanciation des classes, et les classes contiennent des méthodes communes.

Interface IProduct
{
    public function getPrice();
}

class Clothing implements IProduct
{
    private ?string $price = null;

    public function getPrice()
    {
        return $this->price;
    }
}

class TV implements IProduct
{
    private ?string $price = null;

    public function getPrice()
    {
        return $this->price;
    }
}

class ShopFactory
{
    static function createClothing()
    {
        return new Clothing();
    }

    static function createTV()
    {
        return new TV();
    }
}

$shop = new ShopFactory();
$cloting = $shop->createClothing();
var_dump($cloting);