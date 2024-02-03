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

interface ISender
{
    public function readFile();
    public function writeFile();
    public function send();
}

class GmailAdapter implements ISender
{
    private File $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function readFile()
    {
        $this->file->readFile();
    }

    public function writeFile()
    {
        $this->file->writeFile();
    }

    public function send()
    {
        var_dump("gmail send csv : {$this->file->getFilePath()}"); 
    }
}

$csv = new CSV('abc.csv');
$gmailAdpater = new GmailAdapter($csv);
$gmailAdpater->readFile();
$gmailAdpater->writeFile();
$gmailAdpater->send();

$csv = new PDF('def.pdf');
$gmailAdpater = new GmailAdapter($csv);
$gmailAdpater->readFile();
$gmailAdpater->writeFile();
$gmailAdpater->send();