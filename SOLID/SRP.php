<?php
//Responsabilité unique(Single-responsibility principle)
//Chaque classe ou fonction a ses propres fonctionnalités, par exemple une classe Article doit contenir les attributs et les méthodes concernant les articles, on ne mets pas ceux et celles de la classe User(genre "email", "password")
//Le code est plus propre et robustre, et les devs peuvent comprendre rapidement et facilement

class User 
{
    private int $id;
    private string $name;
    private int $age;
}
class Article 
{
    private int $id;
    private string $title;
    private string $content;
    private User $author;
}