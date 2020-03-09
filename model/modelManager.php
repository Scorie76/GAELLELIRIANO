<?php
class modelManager
{
	
    protected  function dbConnect()
    {
	    try
	    {
	        $db = new PDO('mysql:host=db5000258089.hosting-data.io;dbname=dbs251830', 'dbu330271', 'Golf7sw122/');
	        return $db;
		}
	    catch(Exception $e)
	    {
	        die('Erreur : '.$e->getMessage());
	    }
    }
     
}