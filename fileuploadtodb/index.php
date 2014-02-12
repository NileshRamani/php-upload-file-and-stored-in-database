<?php
/*
* @Auther: Nilesh Ramani
* Description: Upload any types of file and it stored to mysql database and retrive it
* Date: 06-01-2014 01:30 PM
*/
?>
<!DOCTYPE html>
<head>
<title>MySQL file upload example</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body style="text-align:center">
<form action="add_file.php" method="post" enctype="multipart/form-data" style="border:1px solid #ccc; padding:10px;">
	Select File: <input type="file" name="uploaded_file" />
	<br /><br />
	<input type="submit" value="Click to upload file">
</form>
<p> <a href="list.php">See all uploaded files</a> </p>
</body>
</html>