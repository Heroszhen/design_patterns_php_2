<?php
//Ouvert/fermé (Open/closed principle)
//une classe doit être à la fois ouverte (à l'extension) et fermée (à la modification)
//utiliser interface ou abstract

interface PaymentMethod {
    public function pay($amount);
}

class Alipay implements PaymentMethod {
    public function pay($amount) {
        echo "Using Alipay to pay $amount.\n";
    }
}

class WeChatPay implements PaymentMethod {
    public function pay($amount) {
        echo "Using WeChatPay to pay $amount.\n";
    }
}

class PayPal implements PaymentMethod {
    public function pay($amount) {
        echo "Using PayPal to pay $amount.\n";
    }
}

class PaymentProcessor {
    private $paymentMethod;

    public function __construct(PaymentMethod $paymentMethod) {
        $this->paymentMethod = $paymentMethod;
    }

    public function processPayment($amount) {
        $this->paymentMethod->pay($amount);
    }
}
