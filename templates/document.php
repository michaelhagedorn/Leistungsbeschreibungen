<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Task: <?php echo $site['site_name']; ?></title>
	<style type="text/css">
	<!--
	@import url("style.css");
	-->
	</style>
	
	
	<script src="http://yui.yahooapis.com/3.13.0/build/yui/yui-min.js"></script>
	
	
	<link rel="stylesheet" href='http://yui.yahooapis.com/3.13.0/build/cssbutton/cssbutton.css'></link>

		
	<script type="text/javascript">
	YUI().use('node', function(Y) {
	    Y.delegate('click', function(e) {
	        var buttonID = e.currentTarget.get('id'),
	            node = Y.one('#task_search');
	            
	        if (buttonID === 'show') {
	            node.show();
	        } else if (buttonID === 'hide') {
	            node.hide();
	        } else if (buttonID === 'toggle') {
	            node.toggleView();
	        }
	
	    }, document, 'button');
	});
</script>
	
</head>
	<body>
	

	
	<?php //<button id="toggle">Search</button> ?>		
		
		
		<?php include('actions.php'); ?>
		<?php include('session.php'); ?>
		<div id="application_window">
			
			<ul class="menu">
			 
			    <li><a href="#">Dashboard</a></li>
			    <li><a href="#">Einzeltätigkeiten</a></li>
			    <li><a href="#">Leistungsbeschreibungen</a>
			 
			        <ul>
			            <li><a href="#" class="documents">Designer</a></li>
			            <li><a href="#" class="messages">Abfrage</a></li>
			            <li><a href="#" class="signout">Angebot</a></li>
			        </ul>
			 
			    </li>
			    <li><a href="#">User</a></li>
			    <li><a href="#">Verbindung
			    
			    	<ul>
			            <li><a href="#" class="documents">Designer</a></li>
			            <li><a href="#" class="messages">Abfrage</a></li>
			            <li><a href="#" class="signout">Angebot</a></li>
			        </ul>
			    
			    </li>
			    <li><a href="#">Konfiguration</a></li>
			 
			</ul>
			<br>
		
			
			<div id="application_content">
				<?php include('header.php'); ?>
				<?php include('content.php'); ?>
				<?php include('footer.php'); ?>
			</div>
		 </div>
		 
</div>


	</body>
</html>
