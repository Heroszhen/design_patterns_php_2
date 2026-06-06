<?php
//Substitution de Liskov (Liskov substitution principle)
//Une classe enfant doit remplacer sa classe mère sans changer son comportement, l'application ne plante pas
//pour la maintenance du code
//pour réutiliser le code

class Operation
{
    protected string $title;
    protected string $code;
    protected string $owner;

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of owner
     */ 
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set the value of owner
     *
     * @return  self
     */ 
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    protected function getPDFContent(array $participations): string
    {
        return "Opération {$this->title} dont le code est {$this->code} a ".count($participations). " participations, elle a été créée par {$this->owner}.";
    }

    public function createPDF(array $participations)
    {
        echo $this->getPDFContent($participations)."\n";
    }
}

class Cooperation extends Operation
{
    private ?int $part = null;

    /**
     * Get the value of part
     */ 
    public function getPart()
    {
        return $this->part;
    }

    /**
     * Set the value of part
     *
     * @return  self
     */ 
    public function setPart($part)
    {
        $this->part = $part;

        return $this;
    }

    protected function getPDFContent(array $participations): string
    {
        $str = parent::getPDFContent($participations);

        if (null !== $this->part) {
            $str .= " Part: {$this->part}.";
        }

        return $str;
    }
}

$o = (new Operation)
    ->setTitle("dfaebdfez")
    ->setCode('0123')
    ->setOwner('Françoise')
;
$o->createPDF([1, 2]);

$co = (new Cooperation)
    ->setPart(50)
    ->setTitle("dfaebdfez")
    ->setCode('0123')
    ->setOwner('Françoise')
;
$co->createPDF([1, 2]);