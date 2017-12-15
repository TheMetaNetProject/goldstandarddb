<html>
<head>
<title>Show and Delete Gold</title>
<script>
function applyFilter() {
	filter_column = document.getElementById("column_to_filter_by").value;
    filter_value = document.getElementById("filter_text").value;
    //new_url = "https://metanet2.icsi.berkeley.edu/metanet2/?q=showall&language=en&"+filter_column+"="+filter_value;
    new_url = "show_all.php?language=en&"+filter_column+"="+filter_value;
    location.assign(new_url);
}
function deleteRow(key,o){
	var xmlhttp=new XMLHttpRequest();
	var p = o.parentNode.parentNode;
	xmlhttp.open("GET","?q=node/18&key="+key,true);
	xmlhttp.send();
	p.parentNode.removeChild(p);
}

function getLanguage() {
	var urlParams = location.search.substring(1,location.search.length).split("&");
	var urlParamsDictionary = {};
	for (i = 0 ; i < urlParams.length ; i++ ) {
		var thePair = urlParams[i].split("=");
		urlParamsDictionary[thePair[0]] = thePair[1];
	}
	var theLanguage = urlParamsDictionary['language'];
	return theLanguage;
}

function addLM(o) {
	var theRow = o.parentNode.parentNode;
	var theSentenceText = theRow.children[2].firstChild;
	// set cookie
	var now = new Date();
	var time = now.getTime();
	time += 3600 * 1000 * 24;
	now.setTime(time);
	document.cookie = "addSentenceValue" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
	document.cookie="addSentenceValue=" + encodeURIComponent(theSentenceText.nodeValue) + "; expires="+now.toUTCString()+"; path=/";
	// the url
	var urlText = theRow.children[1].firstChild;
	urlText = urlText ? urlText : "";
	document.cookie = "addURL" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
	document.cookie = "addURL=" + encodeURIComponent(urlText.nodeValue) + "; expires="+now.toUTCString()+"; path=/"
	//console.log(theSentenceText.nodeValue);
	var languageParam = getLanguage();
	if (theRow.getAttribute("bgcolor") && theRow.getAttribute("bgcolor").valueOf() == "#FC5656") {
		console.log("detected red background color!");
		var negativeRouteDictionary = {};
		negativeRouteDictionary["en"] = "21";
		negativeRouteDictionary["es"] = "24";
		negativeRouteDictionary["ru"] = "23";
		negativeRouteDictionary["fa"] = "22";
		location.assign("https://ambrosia.icsi.berkeley.edu:2080/goldstandard/en_entry_form.php?addsen=true&q=node/"+negativeRouteDictionary[languageParam]);
	} else {  
		location.assign("https://ambrosia.icsi.berkeley.edu:2080/goldstandard/en_entry_form.php?q="+languageParam+"_gold&addsen=true");
	}
}

function editLM(key,o) {
	var theRow = o.parentNode.parentNode;
	// set cookie
	// get present time
	var now = new Date();
	var time = now.getTime();
	time += 3600 * 1000 * 24;
	now.setTime(time);
	// the url
	var urlText = theRow.children[2].firstChild;
	urlText = urlText ? urlText : "";
	document.cookie = "editURL" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
	document.cookie = "editURL=" + encodeURIComponent(urlText.nodeValue) + "; expires="+now.toUTCString()+"; path=/";
	// the sentence
	var theSentenceText = theRow.children[3].firstChild;
	theSentenceText = theSentenceText ? theSentenceText : "" ;
	document.cookie = "editSentence" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
	document.cookie = "editSentence=" + encodeURIComponent(theSentenceText.nodeValue) + "; expires="+now.toUTCString()+"; path=/";
	// the DESC
	var descText = theRow.children[4].firstChild;
	descText = descText ? descText : "";
	document.cookie = "editDESC" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
	document.cookie = "editDESC=" + encodeURIComponent(descText.nodeValue) + "; expires="+now.toUTCString()+"; path=/";
	// the CONS
	var consText = theRow.children[5].firstChild;
	consText = consText ? consText : "" ;
	document.cookie = "editCONS" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
	document.cookie = "editCONS=" + encodeURIComponent(consText.nodeValue) + "; expires="+now.toUTCString()+"; path=/";
	// source word form
	var SWFM = theRow.children[6].firstChild;
	SWFM = SWFM ? SWFM : "" ;
	document.cookie = "editSWFM" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
	document.cookie = "editSWFM=" + encodeURIComponent(SWFM.nodeValue) + "; expires="+now.toUTCString()+"; path=/";
	// source pos
	var SPOS = theRow.children[7].firstChild;
	SPOS = SPOS ? SPOS : "" ;
	document.cookie = "editSPOS" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
	document.cookie = "editSPOS=" + encodeURIComponent(SPOS.nodeValue) + "; expires="+now.toUTCString()+"; path=/";
	// source lemma
	var SLEM = theRow.children[8].firstChild;
	SLEM = SLEM ? SLEM : "" ;
	document.cookie = "editSLEM" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
	document.cookie = "editSLEM=" + encodeURIComponent(SLEM.nodeValue) + "; expires="+now.toUTCString()+"; path=/";
	// source concept
	var SCONC = theRow.children[9].firstChild;
	SCONC = SCONC ? SCONC : "" ;
	document.cookie = "editSCONC" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
	document.cookie = "editSCONC=" + encodeURIComponent(SCONC.nodeValue) + "; expires="+now.toUTCString()+"; path=/";
	// source frame
	var SFRM = theRow.children[10].firstChild;
	SFRM = SFRM ? SFRM : "" ;
	document.cookie = "editSFRM" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
	document.cookie = "editSFRM=" + encodeURIComponent(SFRM.nodeValue) + "; expires="+now.toUTCString()+"; path=/";
	// target word form
	var TWFM = theRow.children[11].firstChild;
	TWFM = TWFM ? TWFM : "" ;
	document.cookie = "editTWFM" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
	document.cookie = "editTWFM=" + encodeURIComponent(TWFM.nodeValue) + "; expires="+now.toUTCString()+"; path=/";
	// target pos
	var TPOS = theRow.children[12].firstChild;
	TPOS = TPOS ? TPOS : "" ;
	document.cookie = "editTPOS" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
	document.cookie = "editTPOS=" + encodeURIComponent(TPOS.nodeValue) + "; expires="+now.toUTCString()+"; path=/";
	// target lemma
	var TLEM = theRow.children[13].firstChild;
	TLEM = TLEM ? TLEM : "" ;
	document.cookie = "editTLEM" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
	document.cookie = "editTLEM=" + encodeURIComponent(TLEM.nodeValue) + "; expires="+now.toUTCString()+"; path=/";
	// target concept
	var TCONC = theRow.children[14].firstChild;
	TCONC = TCONC ? TCONC : "" ;
	document.cookie = "editTCONC" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
	document.cookie = "editTCONC=" + encodeURIComponent(TCONC.nodeValue) + "; expires="+now.toUTCString()+"; path=/";
	// target frame
	var TFRM = theRow.children[15].firstChild;
	TFRM = TFRM ? TFRM : "" ;
	document.cookie = "editTFRM" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
	document.cookie = "editTFRM=" + encodeURIComponent(TFRM.nodeValue) + "; expires="+now.toUTCString()+"; path=/";
	// cm
	var CM = theRow.children[16].firstChild;
	CM = CM ? CM : "" ;
	document.cookie = "editCM" + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
	document.cookie = "editCM=" + encodeURIComponent(CM.nodeValue) + "; expires="+now.toUTCString()+"; path=/";
	// get the language
	var languageParam = getLanguage();
	// load the new page
	
	if (theRow.getAttribute("bgcolor") && theRow.getAttribute("bgcolor").valueOf() == "#FC5656") {
	   console.log("detected red background color!");
	   var negativeRouteDictionary = {};
	   negativeRouteDictionary["en"] = "21";
	   negativeRouteDictionary["es"] = "24";
	   negativeRouteDictionary["ru"] = "23";
	   negativeRouteDictionary["fa"] = "22";  
	   location.assign("https://ambrosia.icsi.berkeley.edu:2080/goldstandard/en_entry_form.php?editlm=true&editKey="+key+"&language="+languageParam+"&q=node/"+negativeRouteDictionary[languageParam]);
	} else {    
	   location.assign("https://ambrosia.icsi.berkeley.edu:2080/goldstandard/en_entry_form.php?q="+languageParam+"_gold&editlm=true&editKey="+key);
	}
}

</script>
<style type="text/css" media="all">
@import url("css/system.base.css");
@import url("css/system.menus.css");
@import url("css/system.messages.css");
@import url("css/system.theme.css");
</style>
<style type="text/css" media="all">
@import url("css/comment.css");
@import url("css/field.css");
@import url("css/node.css");
@import url("css/search.css");
@import url("css/user.css");
</style>
<style type="text/css" media="screen">
@import url("css/reset.css");
@import url("css/style.css");
</style>
</head>

<body>
<?php
// connect to db
// db_set_active('luke');
// $servername = "localhost";
$servername = 'localhost';
$username = "jebolton";
$password = "nodrupal";
$dbname = "goldstandard";
$conn = new mysqli ( $servername, $username, $password, $dbname, 0, "/tmp/mysql.sock" );
// mysql_connect($servername,$username,$password)
// mysql_select_db($dbname)
if (mysqli_connect_errno ()) {
	printf ( "Connect failed: %s\n", mysqli_connect_error () );
	exit ();
}

// $query_parameters = drupal_get_query_parameters();
$query_parameters = array ();
parse_str ( $_SERVER ['QUERY_STRING'], $query_parameters );
// $query_parameters["language"] = "en";
if (! empty ( $query_parameters ['language'] )) {
	$lang = $query_parameters ['language'];
	$possible_params = array (
			"construction",
			"source_wordform",
			"source_lemma",
			"source_concept",
			"source_frame",
			"target_wordform",
			"target_lemma",
			"target_concept",
			"target_frame",
			"cm"
	);
	$filter_param = "";
	$filter_val = "";
	foreach ( $possible_params as $pos_param ) {
		if (array_key_exists ( $pos_param, $query_parameters )) {
			$filter_param = $pos_param;
			$filter_val = $query_parameters [$pos_param];
		}
	}
	if (! empty ( $query_parameters [$filter_param] )) {
		// echo "select * from goldstandard1 where language = '{$lang}' and {$filter_param}= '{$filter_val}' order by sentence_url, sentence <br>";
		// $result=db_query("select * from goldstandard1 where language = '{$lang}' and {$filter_param}= '{$filter_val}' order by sentence_url, sentence");
		$result = $conn->query ( "select * from goldstandard1 where language = '{$lang}' and {$filter_param}= '{$filter_val}' order by sentence_url, sentence" );
	} else {
		// $result=db_query("select * from goldstandard1 where language = '{$lang}' order by sentence_url, sentence");
		// $result = mysql_query("select * from goldstandard1 where language = '{$lang}' order by sentence_url, sentence");
		// $result = $conn->query("select * from goldstandard1 where language = '{$lang}' order by sentence_url, sentence");
		$result = $conn->query ( "select * from goldstandard1 where language = '{$lang}'" );
		$row_cnt = $result->num_rows;
	}
	// $result=db_query("select * from goldstandard1 where language = '{$lang}' {$ta_conc} order by sentence_url, sentence");
	// echo "select * from goldstandard1 where language = '{$lang}' {$ta_conc} order by sentence_url, sentence";
} else {
	// $result=db_query("select * from goldstandard1");
	$result= $conn->query("select * from goldstandard1");
}
$x = 0;

echo "Filter <select id=\"column_to_filter_by\">
      		<option value=\"construction\"> construction </option>
            <option value=\"source_wordform\"> source word form </option>
            <option value=\"source_lemma\"> source lemma </option>
            <option value=\"source_concept\"> source concept </option>
            <option value =\"source_frame\"> source frame </option>
            <option value =\"target_wordform\"> target word form </option>
            <option value =\"target_lemma\"> target lemma </option>
            <option value=\"target_concept\">target concept</option> 
            <option value =\"target_frame\"> target frame </option>
            <option value =\"cm\"> cm </option>
      		</select> by: <input type=\"text\" id=\"filter_text\"> 
      		<button onclick=\"applyFilter()\" type=\"button\">Filter</button> <br>";
echo "<table style=\"table-layout: fixed\"><thead>";
echo "<tr>
          <th style=\"width: 80px; text-align:center\">#</th>
		  <th style=\"width: 20px; text-align:center\">#</th>
          <th style=\"width: 250px;\">url</th>
          <th style=\"width: 200px;\">sentence</th>
          <th style=\"width: 20px;\">id</th>
          <th style=\"width: 120px;\">cons</th>
          <th style=\"width: 80px;\">s_wfrm</th>
          <th style=\"width: 80px;\">s_pos</th>
          <th style=\"width: 80px;\">s_lem</th>
          <th style=\"width: 80px;\">s_conc</th>
          <th style=\"width: 80px;\">s_frm</th>
          <th style=\"width: 80px;\">t_wfrm</th>
          <th style=\"width: 80px;\">t_pos</th>
          <th style=\"width: 80px;\">t_lem</th>
          <th style=\"width: 80px;\">ta_conc</th>
          <th style=\"width: 80px;\">t_frm</th>
          <th style=\"width: 80px;\">cm</th>
     	  <th style=\"width: 80px;\">lang</th>
          <th style=\"width: 80px;\">desc</th>
        </tr>
    </thead><tbody>";

// $row = $result->fetch_assoc();
// $row = $result->fetch_assoc();
// printf ("%s (%s)\n", $row['sentence'], $row['source_lemma']);

while ( $record = $result->fetch_assoc () ) {
	$x = $x + 1;
	$ex = $record['positive_example'];
	if ($ex == TRUE) {
		echo "<tr id=\"positive\">";
	} else {
		echo "<tr id=\"negative\" bgcolor='#FC5656'>";
	};
	echo "<td><button type=\"button\" onclick=\"deleteRow('$record->unique_key',this)\">Delete</button>
	<button type=\"button\" onclick=\"editLM('$record->unique_key',this)\">Edit</button>
	<button type=\"button\" onclick=\"addLM(this)\">Add LM</button></td>";
	echo "<td style=\"border: 1px solid black; text-align:center\">$x</td>";
	echo "<td id=\"url\" url=\"" . urldecode ( $record ['sentence_url'] ) . "\" source=\"" . urldecode ( $record ['source_lemma'] ) . "\" target=\"" . urldecode ( $record ['target_lemma'] ) . "\" sword=\"" . urldecode ( $record ['source_wordform'] ) . "\" tword=\"" . urldecode ( $record ['target_wordform'] ) . "\" tspan=\"" . urldecode ( $record ['target_position'] ) . "\" sspan=\"" . urldecode ( $record ['source_position'] ) . "\" tconc=\"" . urldecode ( $record ['target_concept'] ) . "\" sconc=\"" . urldecode ( $record ['source_concept'] ) . "\" cxn=\"" . urldecode ( $record ['construction'] ) . "\" tframe=\"" . urldecode ( $record ['target_frame'] ) . "\" sframe=\"" . urldecode ( $record ['source_frame'] ) . "\" cm=\"" . urldecode ( $record ['cm'] ) . "\" style=\"border: 1px solid black; word-break: break-word;\">" . urldecode ( $record ['sentence_url'] ) . "</td>";
	echo "<td id=\"sentence\" style=\"border: 1px solid black;\">" . utf8_encode ( urldecode ( $record ['sentence'] ) ) . "</td>";
	echo "<td style=\"border: 1px solid black;\">" . urldecode ( $record ['sentence_id'] ) . "</td>";
	// echo "<td style=\"border: 1px solid black;\">".urldecode($record->unique_key)."</td>";
	echo "<td style=\"border: 1px solid black;\" foo=\"bar\">" . urldecode ( $record ['construction'] ) . "</td>";
	echo "<td style=\"border: 1px solid black;\">" . urldecode ( $record ['source_wordform'] ) . "</td>";
	echo "<td style=\"border: 1px solid black;\">" . urldecode ( $record ['source_position'] ) . "</td>";
	echo "<td  style=\"border: 1px solid black;\">" . urldecode ( $record ['source_lemma'] ) . "</td>";
	echo "<td style=\"border: 1px solid black;\">" . urldecode ( $record ['source_concept'] ) . "</td>";
	echo "<td style=\"border: 1px solid black;\">" . urldecode ( $record ['source_frame'] ) . "</td>";
	echo "<td style=\"border: 1px solid black;\">" . urldecode ( $record ['target_wordform'] ) . "</td>";
	echo "<td style=\"border: 1px solid black;\">" . urldecode ( $record ['target_position'] ) . "</td>";
	echo "<td style=\"border: 1px solid black;\">" . urldecode ( $record ['target_lemma'] ) . "</td>";
	echo "<td style=\"border: 1px solid black;\">" . urldecode ( $record ['target_concept'] ) . "</td>";
	echo "<td style=\"border: 1px solid black;\">" . urldecode ( $record ['target_frame'] ) . "</td>";
	echo "<td style=\"border: 1px solid black;\">" . urldecode ( $record ['cm'] ) . "</td>";
	echo "<td style=\"border: 1px solid black;\">" . urldecode ( $record ['language'] ) . "</td>";
	echo "<td style=\"border: 1px solid black;\">" . urldecode ( $record ['description'] ) . "</td></tr>";
	echo "\n";
}
;
echo "</tbody></table>";
// db_set_active();

?>
</body>
</html>
