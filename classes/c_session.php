<?php

class c_session {
	
	var $strSessionID;
	var $boolLogout;
	var $boolDeleteSessionFile = true;
	
	function __construct() 
	{		
			//echo "CONSTRUCT: Session start - SESSIONID: ".session_id()."<br>";
			$this->start();
			//echo "CONSTRUCT:  Session wurde gestartet - SESSIONID: ".session_id()."<br>";
			
			if (isset($_GET['logout']))
			{
				if($_GET['logout'])
				{
					//echo "<br><br>LOGOUT ist TRUE<br> DESTROY Session with ID: ".$session->strSessionID."-- ".session_id()."<br>";
					$this->logout();
					//echo "New Session with ID: ".$session->strSessionID."-- ".session_id()."<br>";
					return true;
				}
				return false;
			}		
			return false;
	}
	
	function start()
	{		
		session_start();
		$this->strSessionID = session_id();
		return true;
	}
	
	function generate_new_sessionid()
	{
		// neue SessionID wird nur generiert wenn das Löschen der Sessionfile gewünscht ist ($this->boolDeleteSessionFile = true)
		if($this->boolDeleteSessionFile)
		{
			session_regenerate_id ($this->boolDeleteSessionFile);
			$this->strSessionID = session_id();
		}
	}
	
	function logout()
	{
		$this->destroy();
		$this->start();
		$this->generate_new_sessionid();
	}
	
	function destroy()
	{		
		session_unset();
		session_destroy();		
	}
	
	function session_exist()
	{
		if(session_id())
		{
			// Wenn session_id eine ID zurückliefert wird wahr geliefert
			return true;
		}
		return false;			
	}
	
	function validate()
	{
		if ($this->strSessionID === session_id())
		{
			return true;
		}
		return false;
	}
	
	function set_var($varname,$value)
	{
		if (!$varname)
		{
			echo "ungültiger set_var-Aufruf (session) --> \$varname = \"$varname\" ist leer";
			return false;
		}
		else 
		{
			$_SESSION[$varname] = $value;
			
			if($_SESSION[$varname] === $value)
			{
				return true;
			}	
		}		
		return false;
	}
	
	function print_session_id()
	{
		echo $this->strSessionID;
	}
	
	function validate_var($var)
	{
		return isset($_SESSION[$var]);
	}
	
	function get_session_var($varname)
	{
		return $_SESSION[$varname];
	}
	
	function print_var( $varname)
	{
		echo isset($_SESSION[$varname]) ? $_SESSION[$varname] : FALSE;
	}
	
	function get_var($varname)
	{
		return isset($_SESSION[$varname]) ? $_SESSION[$varname] : FALSE;
	}
	
	function unset_var($varname)
	{
		unset($_SESSION[$varname]);
	}
}

?>