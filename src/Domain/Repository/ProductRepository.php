<?php

namespace Diogopachecodev\SerenattoCoffee\Domain\Repository;

use Diogopachecodev\SerenattoCoffee\Domain\Model\Product;

interface ProductRepository
{
    public function allProducts(): array;
    public function allCoffees(): array;
    public function allLunches(): array;
    public function insertProduct(Product $product): bool;
    public function deleteProduct(int $id): bool;
}
