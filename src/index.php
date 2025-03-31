<?php

$coffees = [
    [
        'name' => "Café Cremoso",
        'description' => "Café cremoso irresistivelmente suave e que envolve seu paladar",
        'price' => "5.00",
        'image' => "img/cafe-cremoso.jpg"
    ],
    [
        'name' => "Café com Leite",
        'description' => "A harmonia do café e do leite, uma experiência reconfortante",
        'price' => "2.00",
        'image' => "img/cafe-com-leite.jpg"
    ],
    [
        'name' => "Cappuccino",
        'description' => "Café suave, leite cremoso e uma pitada de sabor adocicado",
        'price' => "7.00",
        'image' => "img/cappuccino.jpg"
    ],
    [
        'name' => "Café Gelado",
        'description' => "Café gelado refrescante, adoçado e com notas sutis de baunilha ou caramelo.",
        'price' => "3.00",
        'image' => "img/cafe-gelado.jpg"
    ]
];

$lunches = [
    [
        'name' => "Bife",
        'description' => "Bife, arroz com feijão e uma deliciosa batata frita",
        'price' => "27.90",
        'image' => "img/bife.jpg"
    ],
    [
        'name' => "Filé de peixe",
        'description' => "Filé de peixe salmão assado, arroz, feijão verde e tomate.",
        'price' => "24.99",
        'image' => "img/prato-peixe.jpg"
    ],
    [
        'name' => "Frango",
        'description' => "Saboroso frango à milanesa com batatas fritas, salada de repolho e molho picante",
        'price' => "23.00",
        'image' => "img/prato-frango.jpg"
    ],
    [
        'name' => "Fettuccine",
        'description' => "Prato italiano autêntico da massa do fettuccine com peito de frango grelhado",
        'price' => "22.50",
        'image' => "img/fettuccine.jpg"
    ]
];

?>


<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Cardápio</title>
</head>
<body>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <img src="img/logo-serenatto.png" class="logo" alt="logo-serenatto">
            </div>
        </section>
        <h2>Cardápio Digital</h2>
        <section class="container-cafe-manha">
            <div class="container-cafe-manha-titulo">
                <h3>Opções para o Café</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-cafe-manha-produtos">
                <?php foreach($coffees as $coffee): ?>
                    <div class="container-produto">
                        <div class="container-foto">
                            <img src="<?= $coffee['image'] ?>">
                        </div>
                        <p><?= $coffee['name'] ?></p>
                        <p><?= $coffee['description'] ?></p>
                        <p><?= "R$ " . $coffee['price'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="container-almoco">
            <div class="container-almoco-titulo">
                <h3>Opções para o Almoço</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-almoco-produtos">
                <?php foreach($lunches as $lunch): ?>
                    <div class="container-produto">
                        <div class="container-foto">
                            <img src="<?= $lunch['image'] ?>">
                        </div>
                        <p><?= $lunch['name'] ?></p>
                        <p><?= $lunch['description'] ?></p>
                        <p><?= "R$ " . $lunch['price'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>
</html>