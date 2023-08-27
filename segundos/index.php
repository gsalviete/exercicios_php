<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Tempo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $total = $_GET["seg"] ?? 0;
    ?>
    <main>
        <h1>Calculadora de Tempo</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <label for="seg">Qual é o total de segundos?</label>
            <input type="number" name="seg" id="seg" value="<?= $total ?>">
            <input type="submit" value="Calcular">
        </form>
    </main>
    <?php 
        $sobra = $total;
        
        $semana = (int)($sobra / 604800);
        $sobra = $sobra % 604800;
        
        $dias = intdiv($sobra, 86400);
        $sobra = $sobra % 86400;
        
        $horas = intdiv($sobra, 3600);
        $sobra = $sobra % 3600;
        
        $min = intdiv($sobra, 60);
        $sobra = $sobra % 60;

        $seg = $sobra;

    ?>
    <section>
        <h2>Totalizando Tudo</h2>
        <p>Analisando o valor que você digitou, <strong><?= $total ?> segundos</strong> equivalem a um total de:</p>
        <ul>
            <li>
                <p><?= $semana ?> semanas</p>
            </li>
            <li>
                <p><?= $dias ?> dias</p>
            </li>
            <li>
                <p><?= $horas ?> horas</p>
            </li>
            <li>
                <p><?= $min ?> minutos</p>
            </li>
            <li>
                <p><?= $seg ?> segundos</p>
            </li>
        </ul>
    </section>
</body>
</html>