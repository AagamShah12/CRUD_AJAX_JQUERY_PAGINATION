<?php
	class Database
	{
		private static $dbname='student';
		private static $dbhost='localhost';
		private static $dbuname='root';
		private static $dbpwd='';
		private static $cont=null;
		public function __construct()
		{
			die('Init function is not allowed');
		}
		public static function connect()
		{
			if(null==self::$cont)
			{
				try{
					//self::$cont=new PDO("mysql:host=".self::dbhost.";"."dname=".self::$dbname,self::$dbuname,self::$dbpwd);
					self::$cont=new PDO('mysql:dbname=student;host=localhost','root','');
					self::$cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
				catch(PDOExcption $e){die($e->getMessage());}
			}
			return self::$cont;
		}
		public static function disconnect()
		{
			self::$cont=null;
		}
	}
?>