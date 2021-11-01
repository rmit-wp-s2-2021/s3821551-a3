<?php
    // City & Country default values.
    $city1 = 'Sydney';
    $city2 = 'Melbourne';
    $city3 = 'Perth';
    $country = 'Australia';

    // API Location: https://developer.here.com/develop/rest-apis
    // API Documentation: https://developer.here.com/documentation
    const API_KEY = 'FMtE7YH6NNOQcsr_dxfnMVXBqoVFqlWdr6sQqU3rLfQ';

    $url1 = "https://image.maps.ls.hereapi.com/mia/1.6/mapview?w=350&h=350&z=10&co=$country&ci=$city1&apiKey=" . API_KEY;
    $url2 = "https://image.maps.ls.hereapi.com/mia/1.6/mapview?w=350&h=350&z=10&co=$country&ci=$city2&apiKey=" . API_KEY;
    $url3 = "https://image.maps.ls.hereapi.com/mia/1.6/mapview?w=350&h=350&z=10&co=$country&ci=$city3&apiKey=" . API_KEY;

    // Open image file, note binary data should be written to using 'w+' mode.
    $imageFile1 = fopen('img/mapview.jpg', 'w+');
    $imageFile2 = fopen('img/map2.jpg', 'w+');
    $imageFile3 = fopen('img/map3.jpg', 'w+');

    // Setup options.
    $options1 = [
        // Save response to the image file.
        CURLOPT_FILE => $imageFile1,
        // Don't verify (auto-trust) certificates.
        CURLOPT_SSL_VERIFYPEER => false
    ];
    $options2 = [
        // Save response to the image file.
        CURLOPT_FILE => $imageFile2,
        // Don't verify (auto-trust) certificates.
        CURLOPT_SSL_VERIFYPEER => false
    ];
    $options3 = [
        // Save response to the image file.
        CURLOPT_FILE => $imageFile3,
        // Don't verify (auto-trust) certificates.
        CURLOPT_SSL_VERIFYPEER => false
    ];

    // Setup curl request.
    $curl_session1 = curl_init($url1);
    $curl_session2 = curl_init($url2);
    $curl_session3 = curl_init($url3);
    curl_setopt_array($curl_session1, $options1);
    curl_setopt_array($curl_session2, $options2);
    curl_setopt_array($curl_session3, $options3);

    // Send request.
    curl_exec($curl_session1);
    curl_exec($curl_session2);
    curl_exec($curl_session3);

    // Close session & file when finished.
    curl_close($curl_session1);
    curl_close($curl_session2);
    curl_close($curl_session3);
    fclose($imageFile1);
    fclose($imageFile2);
    fclose($imageFile3);
?>
