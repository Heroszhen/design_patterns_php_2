<?php
//Ouvert/fermé (Open/closed principle)
//une classe doit être à la fois ouverte (à l'extension) et fermée (à la modification)
//utiliser interface ou classe abstraite

interface PaymentMethod {
    public function pay(string $amount);
}

class Alipay implements PaymentMethod {
    public function pay(string $amount) {
        echo "Using Alipay to pay $amount.\n";
    }
}

class WeChatPay implements PaymentMethod {
    public function pay(string $amount) {
        echo "Using WeChatPay to pay $amount.\n";
    }
}

class PayPal implements PaymentMethod {
    public function pay(string $amount) {
        echo "Using PayPal to pay $amount.\n";
    }
}

class PaymentProcessor {
    private PaymentMethod $paymentMethod;

    public function __construct(PaymentMethod $paymentMethod) {
        $this->paymentMethod = $paymentMethod;
    }

    public function processPayment(string $amount) {
        $this->paymentMethod->pay($amount);
    }
}
