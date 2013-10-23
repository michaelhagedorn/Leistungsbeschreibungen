<?php

#doc
#	classname:	c_task
#	scope:		PUBLIC
#
#/doc



class c_task 
{
	#	internal variables
	var $task_id 	= false;
	var $task_description = false;
	var $task_activity = false;
	var $task_auth = false;
	var $task_time = false;
	var $debug = DEBUGSQL; // globales DEBUGGING übernehmen

	var $intTaskActivityTextLength = FALSE;
	var $intTaskDescriptionTextLength = FALSE;

	var $intTaskMaxTextLength;
	var $intTaskMaxTextLengthDB;
	
	#	Constructor
	function __construct ($task_id)
	{

		if ($task_id)
		{	
			global $db;
			$tmp_len = $db->get_row("SELECT config_value FROM config WHERE config_id = 1");
			$this->intTaskMaxTextLengthDB = $tmp_len->config_value;
			$this->intTaskMaxTextLength = $tmp_len->config_value;			
			$this->debug ? $db->debug() : FALSE; // Debugging wenn $this->debug = true
			#echo "<br>6##########################-".$tmp_len."-########".$this->intTaskMaxTextLength."###########################################<br>";
			$temp_intTaskMaxTextLength = $this->intTaskMaxTextLength;
			echo DEBUG ? "[intTaskMaxTextLength]{".$this->intTaskMaxTextLength."}" : FALSE; // Debugging wenn DEBUG = true
			// sollte es die task_id geben wird sie geladen
			$this->check_task_id($task_id) && $this->load_task($task_id);						
		}
		
	}

	public function load_task($task_id)
	{
		// Globale Datenbankverbinfung verfügbar machen				
		global $db;				
		$task = $db->get_row("SELECT * FROM tasks t INNER JOIN authors a ON (t.task_author = a.auth_id) WHERE t.task_id = '".$task_id."'");
		
		// SQL-Antwort als Objektparameter setzen 
		$this->debug ? $db->debug() : FALSE; // Debugging wenn $this->debug = true
		$this->task_id = $task->task_id;
		$this->task_description = $task->task_description;
		$this->task_activity = $task->task_activity;
		$this->task_author_name = $task->auth_name;
		$this->task_last_edited = $task->task_last_edited;
		$this->task_time = $task->task_time;		

		#echo "task loaded...".$this->intTaskMaxTextLengthDB.$this->intTaskMaxTextLength;	
		
		$this->intTaskMaxTextLength = ( $this->intTaskMaxTextLength < $this->intTaskActivityTextLength) ? $this->intTaskActivityTextLength : $this->intTaskMaxTextLength;
		$this->intTaskMaxTextLength = ( $this->intTaskMaxTextLength < $this->intTaskDescriptionTextLength) ? $this->intTaskDescriptionTextLength : $this->intTaskMaxTextLength;
		($this->intTaskMaxTextLength > $this->intTaskMaxTextLengthDB) ? $this->config_update_intTaskMaxTextLength($this->intTaskMaxTextLength) : FALSE;
		
		
	}
	###
	
	
	
	
	private function check_task_id($task_id)
	{
		// Globale Datenbankverbinfung verfügbar machen		
		global $db;
		// wenn es den Task nicht gibt wird nichts zurückgegeben,
		// sollte es den task geben ist der check erfolgreich						
		return $db->get_row("SELECT task_id, task_description FROM tasks WHERE task_id = '".$task_id."'"); 
	}

	public function update_task_description()
	{
		// Globale Datenbankverbinfung verfügbar machen		
		global $db;
		
		$db->query("UPDATE tasks SET task_description = '".$this->task_description."' WHERE task_id = '".$this->task_id."'");
		$this->debug ? $db->debug() : FALSE; // Debugging wenn $this->debug = true
		$this->update_task_last_edited();
		return true;
	}

	public function update_task_activity()
	{
		// Globale Datenbankverbinfung verfügbar machen		
		global $db;
		
		$db->query("UPDATE tasks SET task_activity = '".$this->task_activity."' WHERE task_id = '".$this->task_id."'");
		$this->debug ? $db->debug() : FALSE; // Debugging wenn $this->debug = true
		$this->update_task_last_edited();
		return true;
	}

	private function update_task_last_edited()
	{
		// Globale Datenbankverbinfung verfügbar machen		
		global $db;
		$db->query("UPDATE tasks SET task_last_edited = '".time()."' WHERE task_id = '".$this->task_id."'");
		$this->debug ? $db->debug() : FALSE; // Debugging wenn $this->debug = true
		return TRUE;
	}			

	public function display_task()
	{
		if (isset($this->task_id))
		{
			echo "<br>Task ID:<b>".$this->task_id."</b>";
			echo "<br>Task Description:<b>".$this->task_description."</b>";
			echo "<br>Task Activity:<b>".$this->task_activity."</b>";
			echo "<br>Task Author:<b>".$this->task_author_name."</b>";

		}
	}

	function print_option_task_id($selected)
	{
		// Alle Tasks als Optionsliste für eine SELECT-BOX ausgeben
		global $db;
		global $session;
		$sql="SELECT t.task_id, t.task_description FROM tasks t";
		$rex = "";
		foreach ($session->get_var('task_categories') as $cat)
		{
			$rex = $rex.$cat."|";		
		}
		$rex = "'".substr($rex, 0, -1)."'";
		$sql = $sql." WHERE t.task_description LiKE \"%".$session->get_var('task_search')."%\" AND t.task_category REGEXP $rex ORDER BY t.task_description";
		
		echo $sql;
		$tasks = $db->get_results($sql, ARRAY_N);
		$this->debug ? $db->debug() : FALSE; // Debugging wenn $this->debug = true
		global $input;
		$input->print_options($tasks,$selected,1,TRUE);
        }
}
###

?>
