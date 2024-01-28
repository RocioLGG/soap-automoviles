<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Ejemplo de uso de servicio web</title>
</head>
<body>
<?php

try {
    $client = new SoapClient(null, array(
            'uri' => 'http://localhost/soap-automoviles/',
            'location' => 'http://localhost/soap-automoviles/service-automoviles.php',
            'trace' => 1
        )
    );
    // fix the cookie value
    $client->__setCookie('__test', '33bc079fcd8162bd9216e4f3eb23e984');

    $marcas = $client->ObtenerMarcas();

    $client->authenticate();

} catch (Exception $e) {
    echo($client->__getLastResponse());
    echo PHP_EOL;
    echo($client->__getLastRequest());
}

?>
<h1>Listado de marcas y modelos disponibles</h1>
<ul>
    <?php
    foreach ($marcas as $key => $value) {
        ?>
        <li><?= $value . "\n" ?>
            <ul>
                <?php
                $modelos = $client->ObtenerModelos($key);
                foreach ($modelos as $m) {
                    ?>
                    <li><?= $m ?></li>
                    <?php
                }
                ?>
            </ul>
        </li>
        <?php
    }
    ?>
</ul>
</body>
</html>
