<?php
//Lorsqu'on veut créer des produits qui sont similaires mais ont un peu de différences
//Beaucoup de valeurs passées en paramètre(dépassant 4) dans le constructeur
//Tous les builders sont indépendants les uns des autres

class Menu
{
    private ?int $cocaCola = null;
    private ?int $hamburger = null;
    private ?int $fries = null;
    private ?int $hotWings = null;
    private ?int $rice = null;
    private ?int $spicyChicken = null;

    /**
     * Set the value of cocaCola
     *
     * @return  self
     */ 
    public function setCocaCola($cocaCola)
    {
        $this->cocaCola = $cocaCola;

        return $this;
    }

    /**
     * Set the value of fries
     *
     * @return  self
     */ 
    public function setFries($fries)
    {
        $this->fries = $fries;

        return $this;
    }

    /**
     * Set the value of hamburger
     *
     * @return  self
     */ 
    public function setHamburger($hamburger)
    {
        $this->hamburger = $hamburger;

        return $this;
    }

    /**
     * Set the value of hotWings
     *
     * @return  self
     */ 
    public function setHotWings($hotWings)
    {
        $this->hotWings = $hotWings;

        return $this;
    }

    /**
     * Set the value of rice
     *
     * @return  self
     */ 
    public function setRice($rice)
    {
        $this->rice = $rice;

        return $this;
    }

    /**
     * Set the value of spicyChicken
     *
     * @return  self
     */ 
    public function setSpicyChicken($spicyChicken)
    {
        $this->spicyChicken = $spicyChicken;

        return $this;
    }
}

interface IBuilder
{
    function setProducts();
}

abstract class AbstractBuilder
{
    protected ?Menu $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }
}

class NormalMenuBuilder extends AbstractBuilder implements IBuilder 
{
    public function __construct(Menu $menu)
    {
        parent::__construct($menu);
    }

    public function setProducts(): void
    {
        $this->menu
            ->setCocaCola(1)
            ->setHamburger(1)
            ->setFries(1)
        ;
    }
}

class ChineseMenuBuilder extends AbstractBuilder implements IBuilder
{
    public function __construct(Menu $menu)
    {
        parent::__construct($menu);
    }

    public function setProducts(): void
    {
        $this->menu
            ->setCocaCola(1)
            ->setFries(1)
            ->setRice(1)
        ;
    }
}

class DailyMenuBuilder extends AbstractBuilder implements IBuilder
{
    public function __construct(Menu $menu)
    {
        parent::__construct($menu);
    }

    public function setProducts(): void
    {
        $this->menu
            ->setCocaCola(1)
            ->setHamburger(1)
            ->setFries(1)
            ->setSpicyChicken(1)
        ;
    }
}

$builder = new NormalMenuBuilder(new Menu);
$builder->setProducts();
var_dump($builder->getMenu());
