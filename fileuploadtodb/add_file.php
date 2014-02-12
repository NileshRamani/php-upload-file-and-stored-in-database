<?php
/*
 * @Auther: Nilesh Ramani 
 * Description: Upload any types of file and it stored to mysql database and retrive it 
 * Date: 06-01-2014 01:30 PM
 */

// Check if a file has been uploaded
if (isset ( $_FILES ['uploaded_file'] )) {
	// Make sure the file was sent without errors
	if ($_FILES ['uploaded_file'] ['error'] == 0) {
		// Connect to the database
		include_once ("db.php");
		$dbLink = new mysqli ( $hostname, $username, $password, $dbname );
		if (mysqli_connect_errno ()) {
			die ( "MySQL connection failed: " . mysqli_connect_error () );
		}
		
		// Gather all required data
		$name = $dbLink->real_escape_string ( $_FILES ['uploaded_file'] ['name'] );
		$mime = $dbLink->real_escape_string ( $_FILES ['uploaded_file'] ['type'] );
		$data = $dbLink->real_escape_string ( file_get_contents ( $_FILES ['uploaded_file'] ['tmp_name'] ) );
		$size = intval ( $_FILES ['uploaded_file'] ['size'] );
		
		// Create the SQL query
		$query = "
            INSERT INTO `uploadfiletodatabase` (
                `name`, `mime`, `size`, `data`, `created`
            )
            VALUES (
                '{$name}', '{$mime}', {$size}, '{$data}', NOW()
            )";
		
		// Execute the query
		$result = $dbLink->query ( $query );
		
		// Check if it was successfull
		if ($result) {
			echo 'Success! Your file was successfully added!';
		} else {
			echo 'Error! Failed to insert the file' . "<pre>{$dbLink->error}</pre>";
		}
	} else {
		echo 'An error accured while the file was being uploaded. ' . 'Error code: ' . intval ( $_FILES ['uploaded_file'] ['error'] );
	}
	
	// Close the mysql connection
	$dbLink->close ();
} else {
	echo 'Error! A file was not sent!';
}

// Echo a link back to the main page
echo '<p>Click <a href="index.php">here</a> to go back</p>';
echo '<p>Click <a href="list.php">here</a> to go uploaded file list</p>';
?>
 
 