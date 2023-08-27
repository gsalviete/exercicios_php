<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $salario = $_GET["sal"] ?? 0;
        $min = 1380;
    ?>
    <main>
        <h1>Informe seu salário</h1>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="get">
            <label for="sal">Salário (R$)</label>
            <input type="number" name="sal" id="sal" value="<?= $salario ?>">
            <p>Considerando o salário mínimo de <strong>R$1.380,00</strong></p>
            <input type="submit" value="Calcular">
        </form>
    </main>
    <section id = "resultado">
        <h2>Resultado Final</h2>
        <?php 
            $padrao = numfmt_create("pt-BR", NumberFormatter::CURRENCY);
            $quant = intdiv($salario, $min);
            $resto = $salario - ($min * $quant);

            echo "<p>Quem recebe um salário de " .numfmt_format_currency($padrao, $salario, "BRL"). " ganha <strong>$quant salário(s) mínimo(s) + " . numfmt_format_currency($padrao, $resto, "BRL") . "</strong> </p>"
        ?>
    </section>
</body>
</html>