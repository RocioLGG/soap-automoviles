<?php

        $params = array('location' => 'http://dwes.infinityfreeapp.com/soap-automoviles/service-automoviles-auth.php',
            'uri' => 'urn://dwes.infinityfreeapp.com/soap-automoviles/service-automoviles-auth.php',
            'trace' => 1);
        $client = new SoapClient(null, $params);

$client->__setCookie('__test', 'a5d44b8862ed2d273b8aefce015f0cfa');
        // set the header
        // https://www.php.net/manual/en/reserved.classes.php
        //Hago un objeto con un usuario y una contraseña que son los siguientes:
        $auth_params = new stdClass();
        $auth_params->username = 'ies';
        $auth_params->password = 'daw';

        // https://www.php.net/manual/en/class.soapheader.php
        // https://www.php.net/manual/en/class.soapvar.php

        $header_params = new SoapVar($auth_params, SOAP_ENC_OBJECT);
        $header = new SoapHeader('http://dwes.infinityfreeapp.com/soap-automoviles/', 'authenticate', $header_params, false);
        $client->__setSoapHeaders(array($header));

echo '<pre>';
var_dump($client->ObtenerMarcasUrl());
var_dump($client->ObtenerModelosPorMarca('Seat'));