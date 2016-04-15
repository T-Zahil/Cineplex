<?php

    // require cache
    require($_SERVER['DOCUMENT_ROOT'] . '/Cineplex/app/class/class.cache.php');

    $CacheRs = new Cache($_SERVER['DOCUMENT_ROOT'] . '/Cineplex/app/tmp/researches', 120); // Cache for researches requests

    $request = $_POST['request'];
    $request = str_replace(' ', '+', $request);

    // check if data is in the cache
    if ($resultsString = $CacheRs->read($request)) {
        $results = json_decode($resultsString);
        $results = $results->results;
    } else {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://api.themoviedb.org/3/search/multi?query=" . $request . "&api_key=11c3be5e8e8bfa3928681ce34c90bd93");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $results = curl_exec($curl);
        curl_close($curl);
        
        $resultsString = $results;
        $results       = json_decode($results);
        $results       = $results->results;
        
        $CacheRs->write($request, $resultsString);
    }

    $data = array();

    for ($i = 0; $i < 5; $i++) {
        $data[$i]['id']        = $results[$i]->id;
        $data[$i]['mediaType'] = $results[$i]->media_type;
        $data[$i]['title']     = $data[$i]['mediaType'] == 'tv' ? $results[$i]->name : $results[$i]->title;
        $data[$i]['release']   = $data[$i]['mediaType'] == 'tv' ? $results[$i]->first_air_date : $results[$i]->release_date;
        $data[$i]['release']   = substr($data[$i]['release'], 0, 4);
    }

    echo json_encode($data);

