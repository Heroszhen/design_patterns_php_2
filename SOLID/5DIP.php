<?php
//Inversion des dépendances (Dependency inversion principle)
//un module de haut niveau ne doit pas dépendre d'un module de bas niveau
//les 2 doivent dépendre des abstractions(interface ou classe abstracte)

interface IWriter 
{
    public function createFile(array $content): void;
}

class PDFWriter implements IWriter
{
    public function createFile(array $content): void
    {
        echo "pdf \n";
    }
}

class TXTWriter implements IWriter
{
    public function createFile(array $content): void
    {
        echo "txt \n";
    }
}

class FileManager
{
    private IWriter $writer;

    public function __construct(IWriter $writer)
    {
        $this->writer = $writer;
    }

    public function create(array $content): void
    {
        $this->writer->createFile($content);
    }
}
