<?php

    $data = array(
        'nombre' => "Testing 333",
        'rut' => "111111-1",
        'edad' => 26,
        'telefono' => "999999999",
        'correo' => "testing@test.com",
        'calle' => "org",
        'comuna' => "org",
        'ciudad' => "Santiago",
        'region' => "Chile",
        'p1' => "no",
        'p2' => "no",
        'p3' => "no",
        'p4' => "no",
        'p5' => "no",
        'p6' => "no",
        'p7' => "no",
        'p8' => "no"
    );

    $curl_object = curl_init('https://precovid.conmapas.cl/nuevaTest');
    curl_setopt_array($curl_object, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FOLLOWLOCATION => 0,
        CURLOPT_ENCODING => '',
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_FAILONERROR => 1,
        CURLOPT_VERBOSE => 1,
        CURLOPT_POST => 1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HEADER => 1,
        CURLOPT_HTTPAUTH => CURLAUTH_ANYSAFE,
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array(
            'User-Agent: PrecovidOrg/1.0.1',
            'Accept: */*',
            'Content-Type: application/json'
        )
    ));

    $res = curl_exec($curl_object);

    if(curl_errno($curl_object)) {
        echo 'Error: ' . curl_error($curl_object);
    } else {
        $info = rawurldecode(var_export(curl_getinfo($curl_object), true));

        $skip = intval(curl_getinfo($curl_object, CURLINFO_HEADER_SIZE));
        $responseHeader = substr($res, 0, $skip);
        $aux = substr($res, $skip);

        echo "HEADER: $responseHeader\n";
        echo "\n\nINFO: $info";
        echo "\n\nDATA: $aux";
    }

    curl_close($curl_object);

    phpinfo();

?>