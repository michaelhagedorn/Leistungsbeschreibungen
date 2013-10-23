<?php

// ContentTypen werden hier definiert
$aContent = array('tasks','foobar');

//Wenn Typ freigegeben ist fortfahren

if (in_array($strContent,$aContent))
{
	# fortfahren
	echo DEBUG ? "Content ist ok" : FALSE; // Debugging wenn DEBUG = true
	switch ($strContent)
	{
		case 'tasks':
			# Taskformular soll geladen werden
			#$task->display_task();
			
			if ($session->get_var('task'))
			{
				$task = new c_task($session->get_var('task'));			
				include ('tasks.php');
			} 
		break;
		
		case 'foobar':
			# foobar
			
		break;
		
				
		default:
			echo "DEFAULT(SWITCH)";
		break;
	}
	
}
else
{
	# Fehlermeldung
	echo DEBUG ? "Content nicht gefunden" : FALSE; // Debugging wenn DEBUG = true
}

?>
