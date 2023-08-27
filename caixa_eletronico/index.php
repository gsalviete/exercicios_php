<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa Eletrônico</title>
    <link rel="stylesheet" href="style.css">
    <style>
        img.nota{
            height: 50px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <?php 
        $saque = $_REQUEST["saque"] ?? 0;
    ?>
    <main>
        <h1>Caixa Eletrônico</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <label for="saque">Qual valor voce deseja sacar? <strong>(R$)</strong><sup>*</sup></label>
            <input type="number" name="saque" id="saque" value="<?= $saque ?>" step="5" required>
            <p style="font-size: 0.7em">*Notas disponíveis: R$100, R$50, R$20 e R$5</p>
            <input type="submit" value="Sacar">
        </form>
    </main>
    <?php 
        $resto = $saque;

        $n100 = intdiv($resto, 100);
        $resto %= 100;

        $n50 = intdiv($resto, 50);
        $resto %= 50;

        $n10 = intdiv($resto, 10);
        $resto %= 10;
        
        $n5 = intdiv($resto, 5);
        $resto %= 5;
    ?>
    <section>
        <h2>Saque de R$<?= number_format($saque, 2, ",", ".")?> realizado</h2>
        <p>O caixa eletrônico vai te entregar as seguintes notas:</p>
        <ul>
            <li>
                <img src="imagens/100-reais.jpg" alt="Nota de 100" class="nota"> <?= $n100 ?>
            </li>
            <li>
                <img src="imagens/50-reais.jpg" alt="Nota de 50" class="nota"><?= $n50 ?>
            </li>
            <li>
                <img src="imagens/10-reais.jpg" alt="Nota de 10" class="nota"> <?= $n10 ?>
            </li>
            <li>
                <img src="imagens/5-reais.jpg" alt="Nota de 5" class="nota"> <?= $n5 ?>
            </li>
        </ul>
    </section>
</body>
</html>