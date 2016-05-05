<?php require_once('../vendor/autoload.php');

use Chandzul\Database\Connection;
loadenv(); // load the configuration file .env

$host = env('DB_HOST', 'localhost');
$user = env('DB_USER', 'root');
$pass = env('DB_PASS', 'root');
$name = env('DB_NAME', 'database');


// $plus = new Connection($host, $user, $pass, $name);
// $results = $plus->select('select * from name_table');
// dd($results->fetch_assoc()); // see dump first line on table results


//$testdd = array(
//	'level1' => 'level 1',
//	'level2' => array(
//		'value' => 'level 2',
//		)
//	);
//
//dd($testdd);