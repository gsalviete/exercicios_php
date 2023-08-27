<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raízes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $numero = $_GET["num"] ?? 0;
        $quad = sqrt($numero);
        $cub = $numero ** (1/3);
    ?>
    <main>
        <h1>Informe um número</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
        <label for="num">Número</label>
        <input type="number" name="num" id="num" value="<?= $numero ?>">
        <input type="submit" value="Calcular">
        </form>
    </main>
    <section id = "resultado">
        <h2>Resultado Final</h2>
        <?= "Analisando o <strong>número $numero</strong>, temos:" ?>
        <ul>
            <li>A sua raiz quadrada é <?= number_format($quad, 3, ",", ".")?></li>
            <li>A sua raiz cúbica é <?= number_format($cub, 3, ",", ".")?></li>
        </ul>
    </section>
</body>
</html>