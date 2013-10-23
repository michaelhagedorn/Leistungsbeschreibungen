<?php

include '../library.php';

$task = new c_task($_GET['task']);
?>

 <div id="task_selection">
 <form action="" name="auswahl_task">
     Einzeltätigkeiten: 
     <select id="input_text" style="width:100%" name="task" size="11" onChange='JavaScript:xmlhttpPost("ajax/print_task.php?task="+this.value)'>      
       <?php 
        $task->print_option_task_id($task->task_id);
       ?>  
     </select>     
     <?php //<input id="input_button" type=submit value="update"> ?>
   </form>
 </div>
