<?php

include '..\library.php';

$task = new c_task($_GET['task']);
?>

 <div id="task_description">
  <form action="" name="input_description">
   <input type="hidden" name="task" value="<?php echo $task->task_id; ?>">
   <input type="hidden" name="action" value="update_task_description">
   Beschreibung:
   <textarea id="input_text" style="width:100%;" name="task_description" rows="<?php echo substr_count($task->task_description, "\n")+1; ?>" onChange="javascript:document.input_description.submit()"><?php echo $task->task_description; ?></textarea>
   <input id="input_button" type=submit value="update">
  </form>
 </div>
 

 <div id="task_info">
 benötigte Zeit: <input id="input_text" type="text" style="width:30px;" name="task_time"  value="<?php echo $task->task_time;  ?>">
   <?php
    echo " zuletzt editiert am ";
    echo date('d.m.Y', $task->task_last_edited);
    echo " um ";
    echo date('H:i:s', $task->task_last_edited);
    echo " von ";
    echo $task->task_author_name;
   ?>
 </div>
 

 <div id="task_activity">
  <form action="" name="input_activity">
   <input type="hidden" name="task" value="<?php echo $task->task_id; ?>">
   <input type="hidden" name="action" value="update_task_activity">
   Tätigkeit: 
   <textarea id="input_text" style="width:100%;" name="task_activity" rows="<?php echo substr_count($task->task_activity, "\n")+1; ?>" onChange="javascript:document.input_activity.submit()"><?php echo $task->task_activity; ?></textarea></td>
   <input id="input_button" type=submit value="update">
  </form>
</div>