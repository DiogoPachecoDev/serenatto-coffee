<?php

require 'vendor/autoload.php';

use Diogopachecodev\SerenattoCoffee\Infrastructure\Repository\PdoProductRepository;

if(!empty($_POST)) {
    $pdo = Diogopachecodev\SerenattoCoffee\Infrastructure\Persistence\Database::connect();
    $productRepository = new PdoProductRepository($pdo);

    $productRepository->deleteProduct($_POST['id']);
}

header('Location: ./admin.php');
exit();
