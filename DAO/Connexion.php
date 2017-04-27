<?php

class Connexion {

	private $PDOInstance = null;
	private static $instance = null;

	const DEFAULT_SQL_DTB = 'ludotheque';
	const DEFAULT_SQL_HOST = 'localhost';
	const DEFAULT_SQL_USER = 'root';
	const DEFAULT_SQL_PASS = '';


	public function __construct(){
		try{
			$this->PDOInstance = new PDO('mysql:dbname='.self::DEFAULT_SQL_DTB.';host='.self::DEFAULT_SQL_HOST,self::DEFAULT_SQL_USER ,self::DEFAULT_SQL_PASS);    
                        $this->PDOInstance->exec("SET NAMES 'UTF8'");
                }
		catch(PDOException $e){
			echo 'La base de donnée n\'est pas disponible, merci de réessayer plus tard.';
                }
	}

	public static function getInstance()
	{
		if(is_null(self::$instance))
		{
			self::$instance = new Connexion();
		}
		return self::$instance;
	}

	public static function prepare($query)
	{
		return Connexion::getInstance()->PDOInstance->prepare($query);
	}
        
        
        
}
//On fait l'appel a getInstance comme ça:

/* foreach (Connexion::getInstance()->query('SELECT * FROM table1') as $membre)
{
	echo '<pre>', print_r($membre) ,'</pre>';
}

 */

?>


