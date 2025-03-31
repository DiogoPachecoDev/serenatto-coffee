<?php

namespace Diogopachecodev\SerenattoCoffee\Domain\Model;

class Product {
    private ?int $id;
    private string $type;
    private string $name;
    private string $description;
    private string $image;
    private float $price;

    public function __construct(?int $id, string $type, string $name, string $description, string $image, float $price)
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

    public function imagePath(): string
    {
        return 'img/' . $this->image;
    }

    public function priceFormatted(): string
    {
        return 'R$ ' . number_format($this->price, 2, ',', '.');
    }
}