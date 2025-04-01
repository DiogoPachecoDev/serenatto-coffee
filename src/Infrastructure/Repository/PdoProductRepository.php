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

    public function allProducts(): array
    {
        $stmt = $this->connection->prepare(" SELECT * FROM products");
        $stmt->execute();

        return $this->hydrateProductsList($stmt);
    }

    public function allCoffees(): array
    {
        $stmt = $this->connection->prepare("SELECT * FROM products WHERE type = 'coffee'");
        $stmt->execute();

        return $this->hydrateProductsList($stmt);
    }

    public function allLunches(): array
    {
        $stmt = $this->connection->prepare(" SELECT * FROM products WHERE type = 'lunch'");
        $stmt->execute();

        return $this->hydrateProductsList($stmt);
    }

    public function insertProduct(Product $product): bool
    {
        $stmt = $this->connection->prepare("INSERT INTO products (name, type, description, price, image) VALUES (:name, :type, :description, :price, :image)");
        $stmt->bindValue(':name', $product->name(), \PDO::PARAM_STR);
        $stmt->bindValue(':type', $product->type(), \PDO::PARAM_STR);
        $stmt->bindValue(':description', $product->description(), \PDO::PARAM_STR);
        $stmt->bindValue(':price', $product->price(), \PDO::PARAM_STR);
        $stmt->bindValue(':image', $product->image(), \PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function deleteProduct(int $id): bool
    {
        $stmt = $this->connection->prepare("DELETE FROM products WHERE id = :id");
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);

        return $stmt->execute();
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
