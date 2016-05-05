<?php namespace Chandzul\Database;

/**
 * Class Connection
 * @package Chandzul\Database
 */
class Connection
{
    private $connection;

    private $server;
    private $user;
    private $pass;
    private $name;

	function __construct($server=false, $user=false, $pass=false,$name=false)
	{
		$this->server = ($server) ? $server : 'localhost';
		$this->user   = ($user) ? $user : 'root';
		$this->pass   = ($pass) ? $pass : 'root';
		$this->name   = ($name) ? $name : 'database';

	    $connectioncheck = mysqli_connect($this->server, $this->user, $this->pass, $this->name);                          

	    if (!$connectioncheck) {
	      die('Database connection failed: '  . mysqli_connect_error());
	    } else {
	        $this->connection = $connectioncheck;
	    }
	}

	function select($sql) 
	{
	    $response = $this->connection->query($sql);
	    if($response === false) {
	        die('SQL: ' . $sql . ' Error: ' . $this->connection->error);
	    } else {
	        return $response;
	    }
	}

	function close() 
	{
	    mysqli_close($this->connection);
	}
}