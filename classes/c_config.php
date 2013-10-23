<?php
include_once('ezSQL/shared/ez_sql_core.php');
include_once('ezSQL/mysql/ez_sql_mysql.php');
date_default_timezone_set('Europe/Berlin'); //timezone
$db = new ezSQL_mysql('root', '', 'lb', 'localhost'); //user, password, database name, host

class c_config {
	
	var $intId;
	var $aCategories;
	var $strSearch;
	var $strAuthorName;
	var $intAuthorId;
	
	
	var $debug = DEBUG;
	var $debugsql = DEBUGSQL;
	
	var $aVars;
	
	
	function  __construct($ID=1)
	{
                global $db;
		//echo "READ FROM CONFIG";
		//$db->debug();
		//$db = new ezSQL_mysql('root', '', 'lb', 'localhost'); //user, password, database name, host
		echo DEFAULT_strContent;
		$aVars = $db->get_row("SELECT * FROM config_vars WHERE config_vars_id = '$ID'");
		//$db->debug();
		$this->strActiveSearch = $aVars->strActiveSearch;
		$this->strActiveCategories = $aVars->strActiveCategories;
		
		$config_author = $db->get_row("SELECT * FROM authors WHERE auth_id = '$ID'");		
		$this->debugsql ? $db->debug() : FALSE; // Debugging wenn $this->debug = true
		
		
		if ($config_author->auth_id && $config_author->auth_config)
		{
			$config_site = $db->get_row("SELECT * FROM config WHERE config_id = '$config_author->auth_config'");
			$this->debugsql ? $db->debug() : FALSE; // Debugging wenn $this->debug = true
			if ($config_site)
			{				
				$this->intId = $config_site->config_id;
				#echo "OKKKKKKKKKKKKK";
				return true;
			}
			return FALSE;
		}
		else
		{
			return FALSE;
		}
		return FALSE;		
	}
	
	function updateVar($var,$value)
	{
		global $db;
		
		return $db->query("UPDATE config_vars SET $var = '$value' WHERE config_vars_id = '$this->intId'");
	}
}
?>