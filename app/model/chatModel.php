<?php

    require ($_SERVER['DOCUMENT_ROOT'].'/Cineplex/config/config.php');

    session_start();
    $room = $_SESSION['room'];

    $req = $_PDO->query("SELECT * FROM rooms WHERE ID='$room'");
    $rows = $req->fetchAll();
    if(!$rows) {
        echo 'Ce salon de discussion n\'existe pas';
        //var_dump($rows);
       // var_dump($room);
        die();
    }

    function ajout_message($_PDO,$pseudo,$message, $room)
    {

        $req = $_PDO->prepare("INSERT INTO message(ID, Pseudo,Message,Date) VALUES(:ID,:Pseudo,:Message,NOW())");
        $req->execute(array("ID"=>$room,"Pseudo"=>$pseudo,"Message"=>$message));

    };
     
    function message($_PDO)
    {
        $req = $_PDO->query("SELECT * FROM message WHERE ID='$_SESSION[room]' ORDER BY Date ASC ");
         
        return $req;
    }
     
    function expire_message($bdd)
    {
         
        $req = $bdd->query("DELETE FROM message WHERE ID='$_SESSION[room]' AND Date < DATE_SUB(NOW(), INTERVAL 240 MINUTE)");
         
    }
     
    function pair($nombre)
    {
        if ($nombre%2 == 0) return true;
        else return false;
    }
     
    function getRelativeTime($date) {
        // get the time
        $time = time() - strtotime($date); 
     
        // Calculates if the time is past or future
        if ($time > 0) {
            $when = "il y a";
        } else if ($time < 0) {
            $when = "dans environ";
        } else {
            return "il y a 1 seconde";
        }
        $time = abs($time); 
     
        // Table of units and their values in seconds
        $times = array( 31104000 =>  'an{s}',       // 12 * 30 * 24 * 60 * 60 seconds
                        2592000  =>  'mois',        // 30 * 24 * 60 * 60 seconds
                        86400    =>  'jour{s}',     // 24 * 60 * 60 seconds
                        3600     =>  'heure{s}',    // 60 * 60 seconds
                        60       =>  'minute{s}',   // 60 seconds
                        1        =>  'seconde{s}'); // 1 second         
     
        foreach ($times as $seconds => $unit) {
            // Calculate the ratio (delta) between time and the particular unit
            $delta = round($time / $seconds); 
     
            if ($delta >= 1) {
                // singular or plural
                if ($delta == 1) {
                    $unit = str_replace('{s}', '', $unit);
                } else {
                    $unit = str_replace('{s}', 's', $unit);
                }
                // return the correct char
                return $when." ".$delta." ".$unit;
            }
        }
    }