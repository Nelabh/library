<?php
session_start();
include('connect.php');
$_SESSION['titleErr']=$_SESSION['authorErr']=$_SESSION['publisherErr']=$_SESSION['editionErr']=$_SESSION['volumeErr']=$_SESSION['reviewErr']=$_SESSION['info']="";
//Back-end processing for user suggestion

	if(isset($_POST['suggest']))					//Check for Key to ensure secure access to page only
	{
	
		//$titleErr=$authorErr=$publisherErr=$editionErr=$volumeErr=$reviewErr="";
		
		$bookname=$_REQUEST['title'];
		$author=$_REQUEST['author'];
		$publisher=$_REQUEST['publisher'];
		$edition=$_REQUEST['edition'];
		$volume=$_REQUEST['volume'];
		$review=$_REQUEST['review'];
		
	
		if (empty($_POST["title"])||empty($_POST["author"])||empty($_POST["publisher"])||empty($_POST["edition"])||empty($_POST["volume"])) 
		{	$_SESSION['info']="Please Input Correct Data";
			if(empty($_POST["title"]))
			{
				$_SESSION['titleErr']= "Title Required";
			}
			else
			{
			$_SESSION['title']=$_REQUEST['title'];
			}
			if(empty($_POST["author"]))
			{
				$_SESSION['authorErr']= "Author Required";
			}
			else
			{
			$_SESSION['author']=$_REQUEST['author'];
			}
			if(empty($_POST["publisher"]))
			{
				$_SESSION['publisherErr']= "Publisher Required";
			}
			else
			{
			$_SESSION['publisher']=$_REQUEST['publisher'];
			}
		
			if(empty($_POST["edition"]))
			{
				$_SESSION['editionErr']= "Edition Required";
			
			}
			else
			{
			$_SESSION['edition']=$_REQUEST['edition'];
			}
			if(empty($_POST["volume"]))
			{
				$_SESSION['volumeErr']= "Volume Required";
			}
			else
			{
			$_SESSION['volume']=$_REQUEST['volume'];
			}
			header('Location:suggest.php');			
		}	
	else
	{
	$_SESSION['titleErr']=$_SESSION['authorErr']=$_SESSION['publisherErr']=$_SESSION['editionErr']=$_SESSION['volumeErr']=$_SESSION['reviewErr']=$_SESSION['info']="";

		$sql="INSERT INTO `suggest`(`bookname`,`author`,`publisher`,`edition`,`volume`,`review`,`date_posted`) VALUES ('$bookname','$author','$publisher','$edition','$volume','$review',NOW())";
		//	echo $sql;
		$res=mysqli_query($db,$sql);
		if(!$res)
		{
			die("error".mysqli_error($db));
		}
		mysqli_close($db);
		$_SESSION['info']="Thank You for your suggestion, it has been recorded successfully";
		header('Location:suggest.php ');
	}
 }
	?>