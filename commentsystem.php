<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="UTF-8">
<title>Conversation System</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

           <link rel="stylesheet" type="text/css" href="commentsystem.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>

	function commentSubmit(){
		if(form1.name.value == '' && form1.comments.value == ''){ //exit if one of the field is blank
			alert('Enter your message !');
			return;
		}
		var name = form1.name.value;
		var comments = form1.comments.value;
		var xmlhttp = new XMLHttpRequest(); //http request instance
		
		xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
			}
		}
		xmlhttp.open('GET', 'insert.php?name='+name+'&comments='+comments, true); //open and send http request
		xmlhttp.send();
	}
	
		$(document).ready(function(e) {
			$.ajaxSetup({cache:false});
			setInterval(function() {$('#comment_logs').load('logs.php');}, 2000);
		});
		
</script>
</head>
<body style="background-color:black; color:black;"><div id="container">
	<div class="page_content">
		<div class="container">
    <div class="d-flex justify-content-center h-300">
                <div class="card">

            <div class="card-header">
    <div class="wrapper">  <br />
    	<h2 align="center"><a href="#">Conversation</a></h2>
  <br />
    </div>
    <div class="comment_input">
    	                        <div class="card-body">

        <form name="form1">
        	<input type="text" minlength="1" maxlength="100" name="name" placeholder="Name..."/></br></br>
            <textarea name="comments" placeholder="Enter Your Opinion..." style="width:635px; height:100px;"></textarea></br></br>

<div class="form-group">
     <input type="hidden" name="comment_id" id="comment_id" value="0" />
            <a href="commentsystem.php" onClick="commentSubmit()" class="btn btn-info">Send</a>

            <input type="reset" class="btn btn-default" value="Delete">

                  <input type="button" class="btn btn-danger" value="Cancel" onclick="history.back()"></div>
        </form>
    </div>
    <div id="comment_logs">

    	Loading ...
    <div></div></div>
</div>
</body>
</html>