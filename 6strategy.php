<?php
//on a plusieurs méthodes ou algorithmes pour traiter un calcul ou une sitation
//on veux envoyer un mail un à client
//on a plusieurs fournisseurs : hostinger gmail, sandinblue, accoustic
//code ou classes séparé, s'il y a une méthode à modifier, on touche pas les autres
//remplaçable， facile à choisir

interface IMailer {
    public function sendMail();
}

class Hostinger implements IMailer
{
    public function sendMail()
    {
        var_dump('mailer : hostinger');
    }
}

class Sandinlbue implements IMailer
{
    public function sendMail()
    {
        var_dump('mailer : sandinblue');
    }
}

class Accoustic implements IMailer
{
    public function sendMail()
    {
        var_dump('mailer : accoustic');
    }
}

class Sender
{
    public $mailer;

    public function __construct(IMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function run()
    {
        $this->mailer->sendMail();
    }
}


$hostingerMailer = new Hostinger();
$sender = new Sender($hostingerMailer);
$sender->run();

$accousticMailer = new Accoustic();
$sender2 = new Sender($accousticMailer);
$sender2->run();