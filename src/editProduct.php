<?php

require '../vendor/autoload.php';

use Diogopachecodev\SerenattoCoffee\Domain\Model\Product;
use Diogopachecodev\SerenattoCoffee\Infrastructure\Repository\PdoProductRepository;

if(!empty($_POST)) {
  $pdo = Diogopachecodev\SerenattoCoffee\Infrastructure\Persistence\Database::connect();
  $productRepository = new PdoProductRepository($pdo);

  $product = new Product($_POST['id'], $_POST['type'], $_POST['name'], $_POST['description'], $_POST['image'], (float) str_replace(['R$ ', '.', ','], ['', '', '.'], $_POST['price']));

  if(!empty($_FILES['image']['name'])) {
    $product->setImage(uniqid() . $_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $product->imagePath());
  }

  $products = $productRepository->updateProduct($product);

  header('Location: ../admin.php');
  exit();
} else if(!empty($_GET)) {
  $pdo = Diogopachecodev\SerenattoCoffee\Infrastructure\Persistence\Database::connect();
  $productRepository = new PdoProductRepository($pdo);

  $product = $productRepository->getProduct($_GET['id']);
} else {
  header('Location: ../admin.php');
  exit();
}

?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../public/css/reset.css">
  <link rel="stylesheet" href="../public/css/index.css">
  <link rel="stylesheet" href="../public/css/admin.css">
  <link rel="stylesheet" href="../public/css/form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="../public/img/icone-serenatto.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Serenatto - Editar Produto</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <img src="../public/img/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
    <h1>Editar Produto</h1>
    <img class= "ornaments" src="../public/img/ornaments-coffee.png" alt="ornaments">
  </section>
  <section class="container-form">
    <form action="#" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $product->id() ?>">

      <label for="nome">Nome</label>
      <input type="text" id="nome" name="name" placeholder="Digite o nome do produto" value="<?= $product->name() ?>" required>

      <div class="container-radio">
          <div>
              <label for="cafe">Café</label>
              <input type="radio" id="cafe" name="type" value="coffee" <?= $product->type() == 'coffee' ? 'checked' : '' ?>>
          </div>
          <div>
              <label for="almoco">Almoço</label>
              <input type="radio" id="almoco" name="type" value="lunch" <?= $product->type() == 'lunch' ? 'checked' : '' ?>>
          </div>
      </div>

      <label for="descricao">Descrição</label>
      <input type="text" id="descricao" name="description" placeholder="Digite uma descrição" value="<?= $product->description() ?>" required>

      <label for="preco">Preço</label>
      <input type="text" id="preco" name="price" placeholder="Digite um preço" value="<?= $product->priceFormatted() ?>" required>

      <label for="imagem">Envie uma imagem do produto</label>
      <input type="file" name="image" accept="image/*" id="imagem" placeholder="Envie uma imagem" value="<?= $product->image() ?>">
      <input type="hidden" name="image" value="<?= $product->image() ?>">

      <input type="submit" class="botao-cadastrar" value="Atualizar produto"/>
    </form>
  </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../public/js/index.js"></script>
</body>
</html>