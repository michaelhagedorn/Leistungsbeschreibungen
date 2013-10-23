<div id="task_search">
 <form action="" name="auswahl_task_search" method="post">
   <input type="hidden" name="action" value="search_task">
     	Suche:<br>
     	 <input id="input_text" type="text" style="width:110px;" name="task_search"  onChange="javascript:document.auswahl_task_search.submit()" value="<?php $session->print_var('task_search');  ?>">
	     <input id="input_button" type=submit value="suchen">
	     <br><input id="demo_box_1" class="css-checkbox" type="checkbox" name="category[]" value="1" <?php echo (in_array('1', $session->get_var('task_categories'))) ? "checked" : FALSE; ?>/><label for="demo_box_1" name="demo_lbl_1" class="css-label">Analyse</label>
		 <br><input id="demo_box_2" class="css-checkbox" type="checkbox" name="category[]" value="2" <?php echo (in_array('2', $session->get_var('task_categories'))) ? "checked" : FALSE; ?>/><label for="demo_box_2" name="demo_lbl_1" class="css-label">Konzeption</label>
		 <br><input id="demo_box_3" class="css-checkbox" type="checkbox" name="category[]" value="3" <?php echo (in_array('3', $session->get_var('task_categories'))) ? "checked" : FALSE; ?>/><label for="demo_box_3" name="demo_lbl_1" class="css-label">Implementierung</label>
		 <br><input id="demo_box_4" class="css-checkbox" type="checkbox" name="category[]" value="4" <?php echo (in_array('4', $session->get_var('task_categories'))) ? "checked" : FALSE; ?>/><label for="demo_box_4" name="demo_lbl_1" class="css-label">Migration</label>
		 <br><input id="demo_box_5" class="css-checkbox" type="checkbox" name="category[]" value="5" <?php echo (in_array('5', $session->get_var('task_categories'))) ? "checked" : FALSE; ?>/><label for="demo_box_5" name="demo_lbl_1" class="css-label">Dokumentation</label>
		 <br><input id="demo_box_6" class="css-checkbox" type="checkbox" name="category[]" value="6" <?php echo (in_array('6', $session->get_var('task_categories'))) ? "checked" : FALSE; ?>/><label for="demo_box_6" name="demo_lbl_1" class="css-label">Projektmanagement</label>
   </form>	
</div> 
 
 <div id="task_selection">
 <form action="" name="auswahl_task">
     Einzeltätigkeiten: 
     <select id="input_text" style="width:100%" name="task" size="11" onChange=JavaScript:xmlhttpPost("ajax/print_task.php?task="+this.value,"task","hahaha","fickdich")>      
       <?php 
        $task->print_option_task_id($task->task_id);
       ?>  
     </select>     
     <?php //<input id="input_button" type=submit value="update"> ?>
   </form>
 </div>
 
<div id="task">
</div>
