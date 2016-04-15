<?php 

	// require cache
	require ($_SERVER['DOCUMENT_ROOT'].'/Cineplex/app/class/class.cache.php');
	define('ROOT', dirname(dirname(__FILE__)));
	$CacheCf = new Cache($_SERVER['DOCUMENT_ROOT'].'/Cineplex/app/tmp/config', 1440); // Cache for config requests
	// $CacheCa = new Cache($_SERVER['DOCUMENT_ROOT'].'/Cineplex/app/tmp/casts', 120); // Cache for casts requests
	$CacheMo = new Cache($_SERVER['DOCUMENT_ROOT'].'/Cineplex/app/tmp/movies', 120); // Cache for movies informations requests
	/*
	*	GET CONFIG
	*/

	if($configString = $CacheCf->read('config')){
		$config = json_decode($configString);
	}
	else{
		$conf = curl_init();
		curl_setopt($conf, CURLOPT_URL, "http://api.themoviedb.org/3/configuration?api_key=11c3be5e8e8bfa3928681ce34c90bd93");
		curl_setopt($conf, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($conf, CURLOPT_HEADER, FALSE);
		curl_setopt($conf, CURLOPT_HTTPHEADER, array("Accept: application/json"));
		$config = curl_exec($conf);
		curl_close($conf);
		$configString = $config;
		$config = json_decode($config);

		$CacheCf->write('config', $configString);

	}

	// Get parameters from AJAX request
	$movieId = $_POST['movieId'];
	$movieType = $_POST['movieType'];
	$data = array();

	/*
	*	GET PRECISE INFORMATIONS
	*/

	if($movieString = $CacheMo->read($movieId)){
		$movie = json_decode($movieString);
	}
	else{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "http://api.themoviedb.org/3/".$movieType."/".$movieId."?api_key=11c3be5e8e8bfa3928681ce34c90bd93");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$movie = curl_exec($curl);
		curl_close($curl);
		$movieString = $movie;
		$movie = json_decode($movie);

		$CacheMo->write($movieId, $movieString);
	}	

	// Prepare datas to return
	$data['poster']   = "<img src='" . $config->images->base_url . $config->images->poster_sizes[1] . $movie->poster_path . "'/>";
	$data['backdrop'] = "<img src='" . $config->images->base_url . $config->images->poster_sizes[1] . $movie->backdrop_path . "'/>";
	//$data['1'] = $config->images->base_url;
	//$data['2'] = $config->images->poster_sizes[1];
	$data['3'] = $movie->backdrop_path;
	//$data['4'] = $movieId;

	/*
	*	RETURN
	*/
	echo json_encode($data);