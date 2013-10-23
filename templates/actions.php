<?php

// ActionTypen werden hier definiert
$aActions = array('update_task_description', 'update_task_activity', 'search_task', 'foobar');

//Wenn Typ freigegeben ist fortfahren

if (in_array($strAction,$aActions))
{
	# fortfahren
	echo DEBUG ? "Action ist OK!" : FALSE; // Debugging wenn DEBUG = true
	switch ($strAction)
	{
		case 'update_task_description':
			# Taskformular soll geladen werden
			#echo "update_task_description";
			$task = new c_task($session->get_var('task'));
			$strTaskDescription ? $task->task_description = $_GET['task_description'] : FALSE;
			$task->update_task_description();
			$task->load_task($session->get_var('task'));			
		break;
		case 'update_task_activity':
			# Taskformular soll geladen werden
			#echo "update_task_description";
			$task = new c_task($session->get_var('task'));
			$strTaskActivity ? $task->task_activity = $_GET['task_activity'] : FALSE;
			$task->update_task_activity();
			$task->load_task($session->get_var('task'));			
		break;
		case 'search_task':
			# Taskformular soll geladen werden
			#echo "update_task_description";
			#$task = new c_task($intTask);
			#$strTaskActivity ? $task->task_activity = $_GET['task_activity'] : FALSE;
			#$task->update_task_activity();
			#$task->load_task($intTask);			
		break;
		case 'foobar':
			# foobar
			echo "foobaraction";
		break;
		
				
		default:
			# code...
			echo "DEFAULT(SWITCH)";
		break;
	}
	
}
else
{
	# Fehlermeldung
	echo DEBUG ? "Action nicht gefunden!" : FALSE; // Debugging wenn DEBUG = true
}
	

?>
