<!DOCTYPE html>
<html>
<head>
    <style>
        figure {
            border: 1px #cccccc solid;
            padding: 4px;
            margin: auto;
        }

        figcaption {
            background-color: navy;
            color: white;
            font-weight: bolder;
            font-style: italic;
            padding: 2px;
            text-align: center;
        }
    </style>
</head>
<body>

<?php
$marca = isset($_GET['marca']) ? $_GET['marca'] : '';

$modelosPorMarca = array(
    'Ford' => array('Ka', 'Fiesta', 'Focus', 'Kuga', 'Mondeo', 'C-Max', 'Galaxy'),
    'Seat' => array('Altea', 'Arosa', 'Córdoba', 'Exeo', 'Ibiza', 'León'),
    'Nissan' => array('Micra', 'Note', 'Pathfinder', 'Almera', 'Qashqai'),
    'Audi' => array('A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8'),
    'BMW' => array('Serie 1', 'Serie 3', 'Serie 5', 'Serie 6', 'Serie 7'),
    'Citroen' => array('C2', 'C3', 'C4', 'Xsara', 'Xsara Picasso')
);

if (array_key_exists($marca, $modelosPorMarca)) {
    echo '<h1>Modelos disponibles marca: ' . $marca . '</h1>';

    foreach ($modelosPorMarca[$marca] as $modelo) {
        echo '<figure>';
        echo '    <img src="images/' . strtolower($marca) . '.png" alt="logo ' . $marca . '" width="100" height="100" />';
        echo '    <figcaption>' . $modelo . '</figcaption>';
        echo '</figure>';
    }
}
?>

</body>
</html>
