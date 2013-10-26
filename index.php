<?php

// Um alle benötigten Klassen, Definitionen und Objekte zur Verfügung zu haben wird die Library eingebunden
// in ihr werden all diese Dinge zusammengefasst
// comittedser
include 'library.php';

?>
<script language="Javascript">
function xmlhttpPost(strURL, toElement, nextUrl, nextTo) {
    var xmlHttpReq = false;
    var self = this;
    var toElement;
    // Mozilla/Safari
    if (window.XMLHttpRequest) {
        self.xmlHttpReq = new XMLHttpRequest();
    }
    // IE
    else if (window.ActiveXObject) {
        self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
    }
    self.xmlHttpReq.open('POST', strURL, true);
    self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    self.xmlHttpReq.onreadystatechange = function() {
        if (self.xmlHttpReq.readyState == 4) {
            update(self.xmlHttpReq.responseText,toElement);
        }
    }
    self.xmlHttpReq.send(getquerystring());

    if(nextUrl && nextTo)
    {
    	document.getElementById('test').innerHTML = nextUrl+nextTo;
    }
}

function getquerystring() {
    var form     = document.forms['f1'];
    var word = form.word.value;
    qstr = 'w=' + escape(word);  // NOTE: no '?' before querystring
    return qstr;
}

function update(str, toElement){
	var toElement;
    document.getElementById(toElement).innerHTML = str+toElement;
   
}
</script>


<form name="f1">
<hr>
<input id="feld1" name="feld1" size="10" value="233">
<br>

<hr>

  <p>word: <input name="word" type="text">  
  <input value="Go" type="button" onclick='JavaScript:xmlhttpPost("ajax/ajax_update.php")'></p>
  <div id="result"></div>
</form>



<?php


// ############################################AJAX
// Umwandlung der Umgebungsvariablen und setzen der defaults
if (isset($_GET['task'])){ $session->set_var('task',$_GET['task']); } else { $session->set_var('task', DEFAULT_intTask); }
if (isset($_GET['content']		)){ $strContent = $_GET['content'];}else{$strContent=DEFAULT_strContent;};
if (isset($_GET['action']		)){ $strAction = $_GET['action'];}else{$strAction=DEFAULT_strAction;};
if (isset($_GET['task_description']	)){ $strTaskDescription = $_GET['task_description'];}else{$strTaskDescription=FALSE;};
if (isset($_GET['task_activity']	)){ $strTaskActivity = $_GET['task_activity'];}else{$strTaskActivity=FALSE;};
if (isset($_POST['category']))
{ 
	$session->set_var('task_categories', $_POST['category']);
}
elseif(!$session->get_var('task_categories'))
{
	$session->set_var('task_categories', array('1','2','3','4','5','6'));
}
//if (isset($_GET['task_search']		)){ $strTaskSearch = $_GET['task_search'];}else{$strTaskSearch=FALSE;};
//if (isset($_GET['category']		)){ $aTaskCategory = $_GET['category'];}else{$aTaskCategory=array('1','2','3','4','5','6');};
if (isset($_POST['task_search']		)){ $session->set_var('task_search', $_POST['task_search']);}

echo "<div id=\"test\">".$session->get_var('task')."</div>";
	$site['site_name']="Taskübersicht";
	include('templates/document.php');


#$t->display_task();




// datenbankabfragen
//$t = $db->get_row("SELECT t.task_id as 'Nummer', t.task_description, a.auth_name as 'Author' FROM tasks t INNER JOIN authors a ON (t.task_author = a.auth_id) WHERE t.task_author = '2'");


//ausgabe

#echo $t->Author;
#echo $t->task_activity;

//debuggung?
#$db->debug();
#echo "hello";
?>
