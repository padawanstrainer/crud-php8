<?php 
session_start( );
$_SESSION['id'] = 2; /* simulamos a rodrigo - todo: login */
$_SESSION['name'] = 'Rodrigo'; /* simulamos a rodrigo - todo: login */


ini_set('display_errors', true);
error_reporting(E_ALL);
date_default_timezone_set("America/Argentina/Buenos_Aires");

define('APP', dirname( __DIR__ ) );
define('ROOT', dirname( APP ) );
define('VIEWS', APP.'/views' );
define('UPLOADS', ROOT.'/pdfs' );

define( 'DB_HOST', 'localhost' );
define( 'DB_USER', 'root' );
define( 'DB_PASS', '' );
define( 'DB_NAME', 'twitch_challenge' );