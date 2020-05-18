<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<title>Files and Directories</title>
</head>
<body>
	<header class="p-2 mb-2">
		<h1>Welcome to an Image Uploader!</h1>
		<form action="" method="post" enctype="multipart/form-data" class="mb-2">
			<input type="hidden" name="MAX_FILE_SIZE" value="100000000">
			<label for="file_upload" id="labelle"><strong>Please choose a file to upload</strong></label>
			<input type="file" name="file_upload" class="file" id="file_upload">
			<br>
			<input type="submit" name="submit" value="Upload" class="upload">
		</form>
		
	<?php 
	// 


	// echo "<button class=\"btn btn-danger m-2 p-2\" onclick=\"del()\">Delete this image</button>";
	// Error Codes
	// See http://www.php.net/manual/en/features.file-upload.errors.php

	// UPLOAD_ERR_OK			0 No errors
	// UPLOAD_ERR_INI_SIZE  	1 Larger than upload_max_filesize
 	// UPLOAD_ERR_FORM_SIZE 	2 Larger than form MAX_FILE_SIZE
 	// UPLOAD_ERR_PARTIAL 		3 Partial upload
	// UPLOAD_ERR_NO_FILE 		4 No file
	// UPLOAD_ERR_CANT_WRITE    6 Can't write file
	// UPLOAD_ERR_NO_TMP_DIR	7 No temporary directory
	// UPLOAD_ERR_EXTENSION     8 File upload stopped by extension


	// Define these errors in an array
	$upload_errors = array(
		UPLOAD_ERR_OK 				=> "No errors.",
		UPLOAD_ERR_INI_SIZE  		=> "Larger than upload_max_filesize.",
		UPLOAD_ERR_FORM_SIZE 		=> "Larger than form MAX_FILE_SIZE.",
		UPLOAD_ERR_PARTIAL 			=> "Partial upload.",
		UPLOAD_ERR_NO_FILE 			=> "No file was selected.",
		UPLOAD_ERR_NO_TMP_DIR 		=> "No temporary directory.",
		UPLOAD_ERR_CANT_WRITE 		=> "Can't write to disk.",
		UPLOAD_ERR_EXTENSION 		=> "File upload stopped by extension.");

	if($_SERVER['REQUEST_METHOD'] == "POST"){

	$error = $_FILES['file_upload']['error'];
	$message = $upload_errors[$error];
	// HANDLE THE FILE UPLOAD
	// what file do we need to move?
	$tmp_file = $_FILES['file_upload']['tmp_name'];

	// set target file name
	// basename gets just the file name
	$target_file = basename($_FILES['file_upload']['name']);

	// set upload folder name
	$upload_dir = 'uploads';


	// $duplicate = 0;
	// $segmented = pathinfo("$target_file");
	// if ($message != $upload_errors[$error]){
	// 	while (file_exists("uploads/$target_file")) {
	// 		$duplicate++;
	// 		$target_file = $segmented['filename'] . "-" . $duplicate . '.' . $segmented['extension'];
	// 		// $target_file = $target_file . $duplicate;
	// 	}
	// }

	// Now lets move the file
	// move_uploaded_file returns false if something went wrong
	if(move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)){
		$message = "File uploaded successfully!";
	} else {
		$error = $_FILES['file_upload']['error'];
		$message = $upload_errors[$error];
	}
	// $_FILES[] super global
	// not stored in $_POST[]
	// echo "<pre>";
	// print_r($_FILES['file_upload']);
	// echo "</pre>";
	} /*else if ($_SERVER['REQUEST_METHOD'] == "GET"){
		if (isset($_GET['d']) && $_GET['d'] === "s") {
			$message = "File successfully deleted.";
		}

	}*/



	if(!empty($message)) {echo "<p class=\"notification\">{$message}</p>";} 

	if (isset($_GET['file'])) {
		if (copy('uploads/' . $_GET['file'], 'backup/' . $_GET['file'])) {
			if (unlink('uploads/' . $_GET['file'])) {
				$message = "File deleted.";
				header('Location: gallery.php');
			} else {
				echo "<p class=\"notification experimental\"><strong>Sorry, I wasn't able to delete that file.</strong></p>";
			}
		} else {
			echo "<p class=\"notification experimental\"><strong>Sorry, I wasn't able to back up that file.</strong></p>";
		}
		
	}
	// Recover last file deleted.
	if (isset($_GET['recover'])) {
		copy('backup/' . $_GET['recover'], 'uploads/' . $_GET['recover']);
		unlink('backup/' . $_GET['recover']);
		header('Location: gallery.php');
	}
	// End PHP tag cuz I felt like it I guess? I could just echo the </header> as well.
	?>
	</header>
	<div id="unit">
	<!-- <aside class="left"></aside> -->
	<main class="pb-4">
	<?php
		// get current working directory
		// echo getcwd();

		// create a directory
		// try creating a directory a second time. What happens?
		!is_dir('uploads') ? mkdir('uploads') : '';
		!is_dir('backup') ? mkdir('backup') : '';

		// view contents of Directories
		// opendir()
		// readdir()
		// closedir()

		// start at current directory
		$dir = "uploads";
		// Make sure uploads exists and is a folder
		if(is_dir($dir)){
			// Create a readable reference to the folder
			if($dir_handle = opendir($dir)){
				// Go through all files
				while($filename = readdir($dir_handle)){
					if (!is_dir($filename)){
						// echo "<p>$filename</p>";
						// Make the filename readable by the browser even if it has special characters or spaces
						$image_file = $filename;
						$filename = urlencode($filename);
						echo "<div class=\"gallery\"><img src=\"uploads/$image_file\" alt=\"$image_file\" title=\"$image_file\"> <br>";
						echo "<a href=\"gallery.php?file=$filename\" ><button class=\"btn btn-danger m-2 p-2\">Delete this image</button></a></div>";
					}
				}

				// you can rewind the directory if you need to
				// rewinddir($dir_handle);

				// close the directory now that we are done with it
				closedir($dir_handle);
			}
		}

/*
		// another approach is to read in contents of directory to an array
		// Make sure it's a folder and not a file
		if(is_dir($dir)){
			// Create an array of all the files
			$dir_array = scandir($dir);
			// Iterate over each of the elements in the array
			foreach ($dir_array as $file) {
				// don't display the . and .. directories. Using the strpos() for this. [Linux related]
				if(strpos($file,'.') > 0){
					// Output the file's name as a string
					echo "filename: {$file}<br/>";
				}
			}
		} // end of if*/
	?>
	</main>
	<!-- <aside class="right"></aside> -->
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>