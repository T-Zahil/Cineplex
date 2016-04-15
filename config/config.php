<?php
/*
 * ========================================
 *            V A R I A B L E S
 * ========================================
 */
    header('Content-Type: text/html; charset=utf-8');
    define('SALT','sd$gqzogEZ£Z%GZ%¨LD');

    // Connection variables
    define('DB_HOST','localhost');
    define('DB_NAME','Cineplex');
    define('DB_USER','root');
    define('DB_PASS','578745');

    //db connection
    try {
        $_PDO = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
        $_PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    }
    catch (Exception $e) {
        die('Cound not connect');
    }

function bdd() {
    return $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
};

    //session
