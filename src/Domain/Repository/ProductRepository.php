<?php

namespace Diogopachecodev\SerenattoCoffee\Domain\Repository;

interface ProductRepository
{
    public function allCoffees(): array;
    public function allLunches(): array;
}
