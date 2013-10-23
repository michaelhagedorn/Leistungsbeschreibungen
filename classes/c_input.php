<?php

class c_input
{
	function __construct()
	{
		//$aOptions = array('1' => 'Option 1',	'2' => 'Option 2');
		global $db;
		//$aOptions = $db->get_results("SELECT task_id, task_description FROM tasks WHERE task_id = '2'",ARRAY_N);
		//$db->debug();
		//$this->print_options($aOptions);
	}	
	
	
	function print_options($aOptions, $strSelectedOption=1, $intType='', $boolFilled=FALSE, $strDevider=' | ')
	{	
		switch ($intType)
		{
			case 1:
				// mit id im Text
				foreach ($aOptions as $Option)
				{
					if ($Option[0] == $strSelectedOption) { $selected = ' selected'; } else { $selected = ''; }
					echo "\n<option value=\"$Option[0]\"$selected>";
					if($boolFilled)
					{ // mit Nullen auffüllen und ID ausgeben
						printf( '%04d', $Option[0]);	
					}
					else 
					{ // keine Nullen auffüllen aber ID ausgeben
						echo $Option[0];
					}
					// Trennzeichen $strDevicer und den Text der Option ausgeben
					echo $strDevider.$Option[1]."</option>";
				}				
				break;	
				
			default:
				
				foreach ($aOptions as $Option)
				{
					if ($Option[0] == $strSelectedOption) { $selected = ' selected'; } else { $selected = ''; }
					echo "\n<option value=\"$Option[0]\"$selected>$Option[1]</option>";
				}				
				break;				
		}		
	}
}
?>