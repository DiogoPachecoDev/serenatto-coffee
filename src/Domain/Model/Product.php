<?php

namespace Diogopachecodev\SerenattoCoffee\Domain\Model;

class Product {
    private ?int $id;
    private string $type;
    private string $name;
    private string $description;
    private string $image;
    private float $price;

    public function __construct(?int $id, string $type, string $name, string $description, string $image = "logo-serenatto.png", float $price)
    {
        $this->id = $id;
        $this->type = $type;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->price = $price;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function image(): string
    {
        return $this->image;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function imagePath(): string
    {
        return '../public/img/' . $this->image;
    }

    public function priceFormatted(): string
    {
        return 'R$ ' . number_format($this->price, 2, ',', '.');
    }

    public function typeFormatted(): string
    {
        $type = "";

        switch($this->type) {
            case 'coffee':
                $type = "Café";
            break;

            case 'lunch':
                $type = "Almoço";
            break;
        }

        return $type;
    }

}