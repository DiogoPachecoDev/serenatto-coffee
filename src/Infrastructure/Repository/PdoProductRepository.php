<?php

namespace Diogopachecodev\SerenattoCoffee\Infrastructure\Repository;

use Diogopachecodev\SerenattoCoffee\Domain\Model\Product;
use Diogopachecodev\SerenattoCoffee\Domain\Repository\ProductRepository;

class PdoProductRepository implements ProductRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allCoffees(): array
    {
        $stmt = $this->connection
            ->prepare(" SELECT * 
                        FROM products
                        WHERE type = 'coffee'");

        $stmt->execute();

        return $this->hydrateProductsList($stmt);
    }

    public function allLunches(): array
    {
        $stmt = $this->connection
            ->prepare(" SELECT * 
                        FROM products
                        WHERE type = 'lunch'");

        $stmt->execute();

        return $this->hydrateProductsList($stmt);
    }

    private function hydrateProductsList(\PDOStatement $stmt): array
    {
        $products = $stmt->fetchAll();

        $products = array_map(function ($product){
            return new Product(
                $product['id'],
                $product['type'],
                $product['name'],
                $product['description'],
                $product['image'],
                $product['price']
            );
        }, $products);

        return $products;
    }
}
