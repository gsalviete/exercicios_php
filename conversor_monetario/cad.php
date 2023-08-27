<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor v2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Conversor monetário</h1>
        <?php 
        $din = $_GET["din"];

        $inicio = date("m-d-Y", strtotime("-7 days"));
        $fim = date("m-d-Y");
        $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''.$inicio.'\'&@dataFinalCotacao=\''.$fim.'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

        $dados = json_decode(file_get_contents($url), true);

        // var_dump($dados);

        $cotação = $dados["value"][0]["cotacaoCompra"];
        
        $dolar = $din / $cotação;
        $padrao = numfmt_create("pt-BR", NumberFormatter::CURRENCY);

        echo "<p>Você possui <strong>" . numfmt_format_currency($padrao, $dolar, "USD") . "</strong>.</p>";
        
        echo "<p>Conversão retirada diretamente do site do <a href=\"https:\/\/www.bcb.gov.br\" target=\"blank\" rel=\"external\"><strong>Banco Central</strong></a></p>";
        ?>
        <button onclick="javascript:history.go(-1)">Voltar</button>
    </main>
</body>
</html>