<?php
//Il permet à un objet (observé) d'envoyer des notifications à d'autres objets(observateurs) pour faire des traitements.
//observé : user
//observateurs : mailer, 
//lorsqu'on change le mot de passe , on envoie un mail à l'utilisateur
//on sépare le code de l'objet observé et de les objets observateurs


class User implements \SplSubject
{
    private $observers;

    private $name;

    private $password;

    public function __construct()
    {
		$this->observers = new \SplObjectStorage();
	}

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        $this->notify();

        return $this;
    }
}

class Mailer implements \SplObserver
{
    public function update(SplSubject $subject): void
    {
        /** @var User $subject */
        $this->sendMessage($subject);
    }

    private function sendMessage(User $user)
    {
        var_dump("mailer : {$user->getName()} vient de changer le mot de passe");
    }
}

$mailerObserver = new Mailer();
$user = new User();
$user->attach($mailerObserver);
$user->setName("Vincent");
$user->setPassword('123');
$user->detach($mailerObserver);