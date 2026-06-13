<?php
//offrir une interface unifiée et simplifiée pour accéder à un sous-système complexe
//cacher les parties que le client(utilisateur) n'ont pas besoin de connaître(voir).
//exemple en dessous: j'ai une seule interface (cinemaFacad) pour utiliser les fonctionnalités(watch, stop), je n'ai pas besoin de m'occuper les autres(Projector, Player, SoundSystem).

class Projector
{
    public function turnOn(): void
    {
        var_dump("Projector: on");
    }

    public function turnOff(): void
    {
        var_dump("Projector: off");
    }
}

class Player
{
    public function turnOn(): void
    {
        var_dump("DVD: on");
    }

    public function turnOff(): void
    {
        var_dump("DVD: off");
    }
}

class SoundSystem
{
    public function turnOn(): void
    {
        var_dump("Sound: on");
    }

    public function turnOff(): void
    {
        var_dump("Sound: off");
    }
}

class CinemaFacad
{
    private Projector $projector;
    private Player $player;
    private SoundSystem $soundSystem;

    public function __construct(
        Projector $projector,
        Player $player,
        SoundSystem $soundSystem
    )
    {
        $this->projector = $projector;
        $this->player = $player;
        $this->soundSystem = $soundSystem;
    }

    public function watchMovie(): void
    {
        $this->projector->turnOn();
        $this->player->turnOn();
        $this->soundSystem->turnOn();
    }

    public function stopMovie(): void
    {
        $this->projector->turnOff();
        $this->player->turnOff();
        $this->soundSystem->turnOff();
    }
}

$projector = new Projector();
$player = new Player();
$soundSystem = new SoundSystem();

//une seule interface
$cinema = new CinemaFacad($projector, $player, $soundSystem);
$cinema->watchMovie();
$cinema->stopMovie();
