<?php

//cache, 
//controller un object instanciée(éviter de s'instancier plusieurs fois)

class ExternAPI 
{
    public function convert(string $c1, string $c2, string $amount): ?string
    {
        return "abc";
    }
}

interface CurrencyConverterInterface
{
    public function convert(string $c1, string $c2, string $amount): ?string;
}

class CurrencyService implements CurrencyConverterInterface
{
    private ExternAPI $api;

    public function __construct(ExternAPI $api)
    {
        $this->api = $api;
    }

    public function convert(string $c1, string $c2, string $amount): ?string
    {
        return $this->api->convert($c1, $c2, $amount);
    }
}

class Proxy implements CurrencyConverterInterface
{
    private CurrencyConverterInterface $service;
    private ?string $previousQuery = null;
    private ?string $previousResult = null;

    public function __construct(CurrencyConverterInterface $service)
    {
        $this->service = $service;
    }

    public function convert(string $c1, string $c2, string $amount): ?string
    {
        $currentQuery = "{$c1}_{$c2}_{$amount}";
        if ($currentQuery === $this->previousQuery) {
            return $this->previousResult;
        }

        $this->previousQuery = $currentQuery;
        $this->previousResult = $this->service->convert($c1, $c2, $amount);

        return $this->previousResult;
    }
}