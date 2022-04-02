<?php 
	/**
	 * 
	 */
	class spkapp extends PDO
	{
		public function __construct($dsn, $username, $password, $options)
		{
			parent::__construct($dsn, $username, $password, $options);
			try
			{
				$this-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				echo "Connect";
			}
			catch (PDOExecption $e)
			{
				echo "Connection Failed " . $e->getMessage();
			}
		}
	}
?>