<?php

//connect to the database.
$link =  pg_connect("host=ec2-54-235-74-57.compute-1.amazonaws.com port=5432 dbname=d1gueknm6h2psa user=pwbtzrsrgvgqrq password=AavMrCiPYOhYhVHj173a2tS2EZ sslmode=require options='--client_encoding=UTF8'");

if (!$link) {
    die("Error in connection: " . pg_last_error());
}



//Get the data
$Query = "";
$doc_name = $_GET['doc_name'];
$spec  = $_GET['spec'];
$loc  = $_GET['loc'];
$cap = $_GET['cap'];
$time = $_GET['time'];
$doc_id = $_GET['doc_id'];
$avail = $cap;
$Query = "INSERT INTO search(doc_name,speciality,loc,doc_id,cap,avail,time) VALUES('".$doc_name."','".$spec."','".$loc."','".$doc_id."',".$cap.",".$avail.",'".$time."')";
$Result = pg_query($link,$Query); //Execute the query
if(!$Result)
{
	die("Error in query: " . pg_last_error());
}
$Query = "INSERT INTO doc_details(doc_name,doc_id,time,cap,avail) VALUES('".$doc_name."','".$doc_id."','".$time."',".$cap.",".$avail.")";
$Result = pg_query($link,$Query); //Execute the query
if(!$Result)
{
	die("Error in query: " . pg_last_error());
}
echo "success";
pg_free_result($Result);
pg_close();
?>
