<?php

//connect to the database.
$link =  pg_connect("host=ec2-54-235-74-57.compute-1.amazonaws.com port=5432 dbname=d1gueknm6h2psa user=pwbtzrsrgvgqrq password=AavMrCiPYOhYhVHj173a2tS2EZ sslmode=require options='--client_encoding=UTF8'");

if (!$link) {
    die("Error in connection: " . pg_last_error());
}



//Get the data
$Query = "";
$doc_name = $_POST['doc_name'];
$doc_id = $_POST['id'];
$spec = $_POST['spec'];
$age  = $_POST['age'];
$sex  = $_POST['sex'];
$phno = $_POST['phno'];
$add = $_POST['add'];
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$Query = "INSERT INTO doc_details(doc_name,add,age,sex,cno,doc_id,spec) VALUES('".$doc_name."','".$add."',".$age.",'".$sex."','".$phno."','".$doc_id."','".$spec."')";
$Result = pg_query($link,$Query); //Execute the query
if(!$Result)
{
	die("Error in query: " . pg_last_error());
}
$Query = "INSERT INTO login(uname,pwd,d_or_p) VALUES('".$uname."','".$pwd."','d')";
$Result = pg_query($link,$Query); //Execute the query
if(!$Result)
{
	die("Error in query: " . pg_last_error());
}
echo "success";
pg_free_result($Result);
pg_close();
?>

