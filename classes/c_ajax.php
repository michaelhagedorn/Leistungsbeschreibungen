<?php

class c_ajax {
    
	function __construct($ID) {
		$this->update_db_field_and_return('tasks', 'task_time', '120', 'task_id', '19');
	}
	
	function update_db_field_and_return($Tabelle, $Spalte, $Neuer_Wert, $Index, $IndexID) {
		
		$sql = "UPDATE $Tabelle SET $Spalte = '$Neuer_Wert' WHERE $Index = '$IndexID' ";
		//echo $SQL;		
	}
}

function dig()
{
    
}
?>
