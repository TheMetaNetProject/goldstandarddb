<?php

$servername='localhost';
$username = "jebolton";
$password = "nodrupal";
$dbname = "goldstandard";
$conn = new mysqli($servername, $username, $password, $dbname,0,"/tmp/mysql.sock");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$row_col_names = "(sentence_url,sentence,description,construction,source_wordform,source_position,source_lemma,source_concept,source_frame,target_wordform,target_position,target_lemma,target_concept,target_frame,language,concept_Version)";

//$row_values = "('{$_GET['sentence']}')";

$row_values = "('{$_GET['sentence_url']}','{$_GET['sentence']}','{$_GET['description']}','{$_GET['construction']}','{$_GET['sVal']}','{$_GET['sStart']}','{$_GET['sLemma']}','{$_GET['sConcept']}','{$_GET['sFrame']}','{$_GET['tVal']}','{$_GET['tStart']}','{$_GET['tLemma']}','{$_GET['tConcept']}','{$_GET['tFrame']}','{$_GET['language']}','{$_GET['cVersion']}')";

file_put_contents("test_of_get.txt",$_GET['sentence']);
file_put_contents("test_of_mysql_load.txt","insert into goldstandard1 ".$row_col_names." values ".$row_values." ; ");

$result = $conn->query("insert into goldstandard1 ".$row_col_names." values ".$row_values." ; ");

?>
