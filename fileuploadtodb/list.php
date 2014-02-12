<?php
/*
 * @Auther: Nilesh Ramani 
 * Description: Upload any types of file and it stored to mysql database and retrive it 
 * Date: 06-01-2014 01:30 PM
 */

// Connect to the database
include_once ("db.php");
$dbLink = new mysqli ( $hostname, $username, $password, $dbname );
if (mysqli_connect_errno ()) {
	die ( "MySQL connection failed: " . mysqli_connect_error () );
}

// Query for a list of all existing files
$sql = 'SELECT `id`, `name`, `mime`, `size`, `created` FROM `uploadfiletodatabase`';
$result = $dbLink->query ( $sql );

// Check if it was successfull
if ($result) {
	// Make sure there are some files in there
	if ($result->num_rows == 0) {
		echo '<p>There are no files in the database</p>';
	} else {
		// Print the top of a table
		echo '<table width="100%">
                <tr>
                    <td><b>Name</b></td>
                    <td><b>Mime</b></td>
                    <td><b>Size (bytes)</b></td>
                    <td><b>Created</b></td>
                    <td><b>&nbsp;</b></td>
                </tr>';
		
		// Print each file
		while ( $row = $result->fetch_assoc () ) {
			echo "
                <tr>
                    <td>{$row['name']}</td>
                    <td>{$row['mime']}</td>
                    <td>{$row['size']}</td>
                    <td>{$row['created']}</td>
                    <td><a href='get_file.php?id={$row['id']}'>Download</a></td>
                </tr>";
		}
		
		// Close table
		echo '</table>';
	}
	
	// Free the result
	$result->free ();
} else {
	echo 'Error! SQL query failed:';
	echo "<pre>{$dbLink->error}</pre>";
}

echo '<p>Click <a href="index.php">here</a> to go home</p>';

// Close the mysql connection
$dbLink->close ();
?>