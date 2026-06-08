<?php
//Il permet de convertir l'interface d'une classe en une autre interface
//on a des classes: csv, pdf, excel qui servent à traiter ces types de fichiers
//on crée une nouvelle interface qui sert à traiter et envoyer n'import quel fichier
//donc on crée un adaptateur qui prend un objet de type File en paramètre

abstract class File
{
    protected string $filePath;

    public function __construct(string $path)
    {
        $this->filePath = $path;
    }

    public function getFilePath()
    {
        return $this->filePath;
    }

    abstract public function readFile();
    abstract public function writeFile();
}

class CSV extends File
{
    public function readFile()
    {
        var_dump("read csv : {$this->filePath}");

        return 'content';
    }

    public function writeFile()
    {
        var_dump("write csv : {$this->filePath}");
    } 
}

class PDF extends File
{
    public function readFile()
    {
        var_dump("read pdf : {$this->filePath}");
    }

    public function writeFile()
    {
        var_dump("write pdf : {$this->filePath}");
    } 
}

interface IModifiable 
{
    public function modify();
}

class FileAdapter implements IModifiable
{
    private File $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function modify()
    {
        var_dump("{$this->file->getFilePath()}: modify {$this->file->readFile()}"); 
    }
}

$csv = new CSV('abc.csv');
$adpater = new FileAdapter($csv);
$adpater->modify();

$csv = new PDF('def.pdf');
$adpater = new FileAdapter($csv);
$adpater->modify();
