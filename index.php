
<!DOCTYPE html>
<html>
<head> 
	<link rel="stylesheet" href="upload.css">
</head>
  <body style:"backgruond-color:grey">


	<center>
<div class="container">
      <form action="" method="post" enctype="multipart/form-data">  
      <h1>Select File:  </h1>
     </br> <input type="file" name="Userfile"/>  <br><br>
     </br> <input type="submit" value="Uploads" /> <br><br>
    </center>
     </form>  
  </body>
</html>



<?php  
 	if(isset($_FILES['Userfile'])){
 		$errors= array();
 		$file_name = $_FILES['Userfile']['name'];
 		$file_size = $_FILES['Userfile']['size'];
 		$file_tmp = $_FILES['Userfile']['tmp_name'];
 		$file_type = $_FILES['Userfile']['type'];


 		$file_ext=strtolower(end(explode('.',$_FILES['Userfile']['name'])));

 		$extensions= array("jpeg","jpg","png");

 		if(in_array($file_ext,$extensions)=== false){
 			$errors[]="File must be JPEG or PNG.";
		}

		if($file_size > 2097152){
			$errors[]='File size must be extactly 2MB';
		}

		if(empty($errors)==true){
			move_uploaded_file($file_tmp,"./uploads/".$file_name);
			echo "Success";
		}else{
			print_r($errors);
		}
 	}
?>  