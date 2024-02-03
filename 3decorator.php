<?php
//ajouter dynamiquement des fonctionnalités et des comportements à une classe sans la modifier
//on a une classe Notifier qui implémente une interface INotifier , elle sert à envoyer des messages par gmail
//on veux aussi envoyer des messages par hotmail et sms

interface INotifier {
    public function sendMessage(string $message);
}

class Notifier implements INotifier 
{
    public function sendMessage(string $message)
    {
        var_dump("gmail : {$message}");
    }
}

abstract class Decorator implements INotifier
{
    protected INotifier $notifier;
    
    public function __construct(INotifier $notifier)
    {
        $this->notifier = $notifier;
    }
}

class HotmailDecorator extends Decorator
{
    public function sendMessage(string $message)
    {
        $this->notifier->sendMessage($message);
    }

    public function sendMessageByHotmail(string $message)
    {
        var_dump("hotmail : {$message}");
    }
}

class SMSDecorator extends Decorator
{
    public function sendMessage(string $message)
    {
        $this->notifier->sendMessage($message);
    }

    public function sendMessageBySMS(string $message)
    {
        var_dump("sms : {$message}");
    }
}

$notifier = new Notifier();

$smsNotifier = new SMSDecorator($notifier);
$smsNotifier->sendMessage('abc');
$smsNotifier->sendMessageBySMS('cba');

$hotmailNotifier = new HotmailDecorator($notifier);
$hotmailNotifier->sendMessageByHotmail('bac');