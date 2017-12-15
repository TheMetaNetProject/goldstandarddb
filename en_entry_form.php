<script type="text/javascript" src="jquery2.js"></script>
<script type="text/javascript" src="jquery.caret2.min.js"></script>
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
<script> jQuery2(document)
                .ready(function(){
                $("input:text.sensor")
                .keydown(function(){
                        $("span.caretStart").text( $(this).caret().start)
                        $("span.caretEnd").text($(this).caret().end)
                })
                .keypress(function(){
                        $("span.caretStart").text($(this).caret().start);
                        $("span.caretEnd").text($(this).caret().end)
                })
                .mousemove(function(){
                        $("span.caretStart").text($(this).caret().start);
                        $("span.caretEnd").text($(this).caret().end)
                });
                $("input:button.source").click(function(){
                        document.getElementById("sStart").value = $("textarea.parse").caret().start+","+$("textarea.parse").caret().end;
                        document.getElementById("sVal").value = $("textarea.parse").caret().text;
                        document.getElementById("sentence").setAttribute("readonly",true);
                        document.getElementById("sentence_url").setAttribute("readonly",true);
                });
                $("input:button.target").click(function(){
                        document.getElementById("tStart").value  =  $("textarea.parse").caret().start+","+$("textarea.parse").caret().end;
                        document.getElementById("tVal").value = $("textarea.parse").caret().text;
                        document.getElementById("sentence").setAttribute("readonly",true);
                        document.getElementById("sentence_url").setAttribute("readonly",true);
                });
                $("input:button.newLM").click(function(){
                        if (
                            //document.getElementById("sentence_url").value===""||
                            document.getElementById("sentence").value===""||
                            //document.getElementById("description").value===""||
                            //document.getElementById("construction").value===""||
                            document.getElementById("sVal").value===""||
                            document.getElementById("sStart").value===""||
                            //document.getElementById("sLemma").value===""||
                            //document.getElementById("sFrame").value===""||
                            document.getElementById("tVal").value===""||
                            document.getElementById("tStart").value===""
                            //document.getElementById("tLemma").value===""||
                            //document.getElementById("tConcept").value===""||
                            //document.getElementById("tFrame").value===""||
                            //document.getElementById("cVersion").value===""
                            ) {
                          document.getElementById("output").innerHTML = "<h1>Please add a source and/or target<h1>";
                        }
                        else {
                        document.getElementById("next").setAttribute("disabled",true);
                        document.getElementById("sentence").setAttribute("readonly",true);
                        document.getElementById("sentence_url").setAttribute("readonly",true);
                        document.getElementById("next").style.background = "rgb(209,209,209)";
                        document.getElementById("output").innerHTML =
                                "<b style=\"text-size:150%\">What will go in DB</b></br>"+
                                "url: "+document.getElementById("sentence_url").value+"</br>"+
                                "sentence: "+document.getElementById("sentence").value+"</br>"+
                                "description: "+document.getElementById("description").value+"</br>"+
                                "construction: "+document.getElementById("construction").value+"</br>"+
                                "source wordform: "+document.getElementById("sVal").value+"</br>"+
                                "source position: "+document.getElementById("sStart").value+"</br>"+
                                "source lemma: "+document.getElementById("sLemma").value+"</br>"+
                                "source concept: "+document.getElementById("sConcept").value+"</br>"+
                                "source frame: "+document.getElementById("sFrame").value+"</br>"+
                                "target wordform: "+document.getElementById("tVal").value+"</br>"+
                                "target position: "+document.getElementById("tStart").value+"</br>"+
                                "target lemma: "+document.getElementById("tLemma").value+"</br>"+
                                "target concept: "+document.getElementById("tConcept").value+"</br>"+
                                "target frame: "+document.getElementById("tFrame").value+"</br>"+
                                "cm: "+document.getElementById("cm").value+"</br>"+
                                "language: "+document.getElementById("language").value+"</br>"+
                                "concept version: "+document.getElementById("cVersion").value+"</br>"+
                                "<input class=\"testlm\" type=\"button\" style=\"color: white;padding: 10px;margin: 10px 0px 0px 0px;border-radius: 10px;text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);background: rgb(66, 184, 221);\" value=\"Submit LM\">";

                                $("input:button.testlm").click(function(){
                                                $.ajax({
                                                   type: "GET",
                                                   url: "submit_to_gold_standard.php",
                                                   data: {
                                                        sentence_url: encodeURIComponent(document.getElementById("sentence_url").value),
                                                        sentence: encodeURIComponent(document.getElementById("sentence").value),
                                                        description: encodeURIComponent(document.getElementById("description").value),
                                                        construction: encodeURIComponent(document.getElementById("construction").value),
                                                        sVal: encodeURIComponent(document.getElementById("sVal").value),
                                                        sStart: encodeURIComponent(document.getElementById("sStart").value),
                                                        sLemma: encodeURIComponent(document.getElementById("sLemma").value),
                                                        sConcept: encodeURIComponent(document.getElementById("sConcept").value),
                                                        sFrame: encodeURIComponent(document.getElementById("sFrame").value),
                                                        tVal: encodeURIComponent(document.getElementById("tVal").value),
                                                        tStart: encodeURIComponent(document.getElementById("tStart").value),
                                                        tLemma: encodeURIComponent(document.getElementById("tLemma").value),
                                                        tConcept: encodeURIComponent(document.getElementById("tConcept").value),
                                                        tFrame: encodeURIComponent(document.getElementById("tFrame").value),
                                                        cm: encodeURIComponent(document.getElementById("cm").value),
                                                        language: encodeURIComponent(document.getElementById("language").value),
                                                        cVersion: encodeURIComponent(document.getElementById("cVersion").value),
                                                        pos: 1,
                                                 },
                                                   success: function() {   var urlParams = location.search.substring(1,location.search.length).split("&");
                                                                                    var urlParamsDictionary = {};
                                                                                     for (i = 0 ; i < urlParams.length ; i++ ) {
                                                                                           var thePair = urlParams[i].split("=");
                                                                                           urlParamsDictionary[thePair[0]] = thePair[1];
                                                                                     }
                                                                                    var editMode = false;
                                                                                    var editId;
                                                                                     if ("editlm" in urlParamsDictionary) {
                                                                                          editMode = true;
                                                                                          editId = urlParamsDictionary["editKey"];
                                                                                     }
                                                                                    if (editMode) {
                                                                                               document.getElementById("output").innerHTML = "<h1>LM Edited In DB<h1>";
                                                                                               var xmlhttp=new XMLHttpRequest();
                                                                                               var theLanguage = urlParamsDictionary["q"].substring(0,2);
                                                                                               var returnToEditPage = function ()  { if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                                                                                                          location.assign("https://ambrosia.icsi.berkeley.edu:2080/goldstandard/show_all.php?q=showdelete&language="+theLanguage);
                                                                                               } } ;
                                                                                               xmlhttp.onreadystatechange=returnToEditPage;
                                                                                               xmlhttp.open("GET","?q=node/18&key="+editId,true);
                                                                                               xmlhttp.send();    
                                                                                    } else {
                                                                                               document.getElementById("output").innerHTML = "<h1>LM Added to DB<h1>"; 
                                                                                    }
                                                  },
                                                 });

                                                  document.getElementById("next").disabled= false;
                                                  document.getElementById("next").style.background = "rgb(66,184,221)";
                                                  document.getElementById("output").innerHTML = "";
                                                  document.getElementById("description").value = "";
                                                  document.getElementById("construction").value = "";
                                                  document.getElementById("sVal").value = "";
                                                  document.getElementById("sStart").value = "";
                                                  document.getElementById("sLemma").value = "";
                                                  document.getElementById("sConcept").value = "";
                                                  document.getElementById("sFrame").value = "";
                                                  document.getElementById("tVal").value = "";
                                                  document.getElementById("tStart").value = "";
                                                  document.getElementById("tLemma").value = "";
                                                  document.getElementById("tConcept").value = "";
                                                  document.getElementById("tFrame").value = "";
                                                  document.getElementById("cm").value = "";
                                                  //document.getElementById("language").value = "";
                                                  document.getElementById("cVersion").value = "0";
                                });
                       };
                });
                $("input:button.clear").click(function(){
                        document.getElementById("sentence_url").removeAttribute("readonly",0);
                        document.getElementById("sentence").removeAttribute("readonly",0);
                        document.getElementById("next").disabled= false;
                        document.getElementById("next").style.background = "rgb(66,184,221)";
                        document.getElementById("output").innerHTML = "";
                        document.getElementById("description").value = "";
                        document.getElementById("construction").value = "";
                        document.getElementById("sVal").value = "";
                        document.getElementById("sStart").value = "";
                        document.getElementById("sLemma").value = "";
                        document.getElementById("sConcept").value = "";
                        document.getElementById("sFrame").value = "";
                        document.getElementById("tVal").value = "";
                        document.getElementById("tStart").value = "";
                        document.getElementById("tLemma").value = "";
                        document.getElementById("tConcept").value = "";
                        document.getElementById("tFrame").value = "";
                        document.getElementById("cm").value = "";
                        //document.getElementById("language").value = "";
                        document.getElementById("cVersion").value = "0";
                });
        });

</script>

<h2>MetaNet Input Page</h2>
<link rel="stylesheet" href="css/pure-min.css">
<form class="pure-form pure-form-aligned">
    <fieldset>
        <div class="pure-control-group">
            <label for="sentence_url">URL</label><input type="text" id="sentence_url" placeholder="Url"/>
        </div>
        <div class="pure-control-group">
            <label for="sentence">Sentence</label><textarea class="parse" id="sentence" rows="4" cols="60" border="1">This is a sample value</textarea>
        </div>
        <div class="pure-controls">
<input class="source" type="button" style="color: white;padding: 10px;margin: -5px 5px 10px 0px;border-radius: 10px;text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);background: rgb(66, 184, 221);" value="Source">
<input class="target" type="button" style="color: white;padding: 10px;margin: -5px 5px 10px 0px;border-radius: 10px;text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);background: rgb(66, 184, 221);" value="Target">
        </div>
<table><tr><td width="50%" style="vertical-align: top;tex-align: left;">
        <div class="pure-control-group">
              <label for="description">Description</label><input type="text" id="description" placeholder="Description" />
        </div>
        <div class="pure-control-group">
             <label for="construction">Construction</label><select id="construction">
                            <?php
                              $sql = "SELECT * FROM {constructions} ORDER BY construction";
                              $servername='localhost';
                              $username = "jebolton";
                              $password = "nodrupal";
                              $dbname = "goldstandard";
                              $conn = new mysqli($servername, $username, $password, $dbname,0,"/tmp/mysql.sock");
                              //db_set_active('luke');
                              //$result = db_query($sql);
                              //db_set_active();
                              $result = $conn->query($sql);

                              foreach ($result as $data){
                                    echo "<option value=\"$data->construction\">$data->construction</option>";
                              }
                            ?>
                            <option value="other">Other-Please add in Description Field</option>
                </select>
        </div>
        <div class="pure-control-group">
          <label for="source">Source Wordform</label><input type="text" id="sVal" readonly/>
        </div>
        <div class="pure-control-group">
             <label for="sPos">Source  Position</label><input type="text" id="sStart" readonly/>
        </div>
        <div class="pure-control-group">
          <label for="sLemma">Source Lemma</label><input type="text" id="sLemma" />
        </div>
        <div class="pure-control-group">
          <label for="sConcept">Source Concept</label><input type="text" id="sConcept" />
        </div>
        <div class="pure-control-group">
          <label for="sFrame">Source Frame</label><input type="text" id="sFrame" />
        </div>
        <div class="pure-control-group">
          <label for="tVal">Target Wordform</label><input type="text" id="tVal" readonly/>
        </div>
        <div class="pure-control-group">
          <label for="tPos">Target Position</label><input type="text" id="tStart" readonly/>
        </div>
        <div class="pure-control-group">
          <label for="tLemma">Target Lemma</label><input type="text" id="tLemma" />
        </div>
        <div class="pure-control-group">
          <label for="tConcept">Target Concept</label><input type="text" id="tConcept" />
        </div>
        <div class="pure-control-group">
          <label for="tFrame">Target Frame</label><input type="text" id="tFrame" />
        </div>
        <div class="pure-control-group">
          <label for="cm">Metaphor</label><input type="text" id="cm" />
        </div>
        <div class="pure-control-group">
          <label for="language">Language</label><input type="text" id="language" value="en" readonly/>
        </div>
        <div class="pure-control-group">
          <label for="cVersion">Concept Version</label><input type="text" id="cVersion" value=0 />
        </div>
        <div class="pure-controls">
<input class="newLM" type="button"  style="color: white;padding: 10px;margin: -5px 5px 10px 0px;border-radius: 10px;text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);background: rgb(66, 184, 221);" value="Add LM">                                
<input class="clear" type="button" style="color: white;padding: 10px;margin: -5px 5px 10px 0px;border-radius: 10px;text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);background: rgb(66, 184, 221);" value="Clear LM">
<input class="next" id="next" type="button" value="Next Sentence"  style="color: white;padding: 10px;margin: -5px 5px 10px 0px;border-radius: 10px;text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);background: rgb(66, 184, 221);" onClick="window.location.reload(true)">
        </div>
    </fieldset>
</form>
<hr/>
</td><td style="vertical-align: top;tex-align: left; margin-top:-50px" id="output">
</td></tr></table>

<script>
// get url params
var urlParamsDictionary = {} ;
var urlParamArray = location.search.substring(1,location.search.length).split("&");
for (i = 0; i <  urlParamArray.length ; i++) {
     var keyValuePair = urlParamArray[i].split("=");
     urlParamsDictionary[keyValuePair[0]] = keyValuePair[1];
}
// get cookies
var cookieKV = {} ;
var cookieKVArray = document.cookie.split(";");
console.log(cookieKVArray);
console.log(document.cookie);
for (i = 0 ; i < cookieKVArray.length ; i++) {
  var cookieKVPair = cookieKVArray[i].split("=");
  if (!(cookieKVPair[0].trim() in cookieKV)) {
    cookieKV[cookieKVPair[0].trim()] = cookieKVPair[1].trim();
 }
}
// check if this add sentence version, alter accordingly
if ("addsen" in urlParamsDictionary) {
   console.log("addsen = "+urlParamsDictionary["addsen"]);
   console.log("addSentenceValue = "+cookieKV["addSentenceValue"]);
   var sentenceField = document.getElementById("sentence");
   sentenceField.value = decodeURIComponent(cookieKV["addSentenceValue"]);
   var urlField = document.getElementById("sentence_url");
   if (cookieKV["addURL"].valueOf() != "undefined") {
      urlField.value = decodeURIComponent(cookieKV["addURL"]);
   }
}
if ("editlm" in urlParamsDictionary) {
  console.log("editlm = "+urlParamsDictionary["editlm"]);
  // set sentence
  var sentenceField =  document.getElementById("sentence");
  sentenceField.value =  decodeURIComponent(cookieKV["editSentence"]);
  // set url
  var urlField = document.getElementById("sentence_url");
  if (cookieKV["editURL"] != "undefined") {
    urlField.value = decodeURIComponent(cookieKV["editURL"]);
  }
  // set DESC
   var descField = document.getElementById("description");
   if (cookieKV["editDESC"].valueOf() != "undefined") {
     descField.value = decodeURIComponent(cookieKV["editDESC"]);
   }
  // set CONS
  var consField = document.getElementById("construction");
  if (cookieKV["editCONS"].valueOf() != "undefined") { 
    consField.value = decodeURIComponent(cookieKV["editCONS"]);
  }
  // set SWFM
  var swfmField = document.getElementById("sVal");
  if (cookieKV["editSWFM"].valueOf() != "undefined") { 
    swfmField.value = decodeURIComponent(cookieKV["editSWFM"]);
  }
  // set SPOS
  var swfmField = document.getElementById("sStart");
  if (cookieKV["editSPOS"].valueOf() != "undefined") { 
    swfmField.value = decodeURIComponent(cookieKV["editSPOS"]);
  }
  // set SLEM
  var slemField = document.getElementById("sLemma");
  if (cookieKV["editSLEM"].valueOf() != "undefined") { 
    slemField.value = decodeURIComponent(cookieKV["editSLEM"]);
  }
  // set source concept
  var sconcField = document.getElementById("sConcept");
  if (cookieKV["editSCONC"].valueOf() != "undefined") { 
    sconcField.value = decodeURIComponent(cookieKV["editSCONC"]);
  }
  // set source frame
  var sfrmField = document.getElementById("sFrame");
  if (cookieKV["editSFRM"].valueOf() != "undefined") { 
    sfrmField.value = decodeURIComponent(cookieKV["editSFRM"]);
  }
  // set TWFM
  var twfmField = document.getElementById("tVal");
  if (cookieKV["editTWFM"].valueOf() != "undefined") { 
    twfmField.value = decodeURIComponent(cookieKV["editTWFM"]);
  }
  // set TPOS
  var twfmField = document.getElementById("tStart");
  if (cookieKV["editTPOS"].valueOf() != "undefined") { 
    twfmField.value = decodeURIComponent(cookieKV["editTPOS"]);
  }
  // set TLEM
  var tlemField = document.getElementById("tLemma");
  if (cookieKV["editTLEM"].valueOf() != "undefined") { 
    tlemField.value = decodeURIComponent(cookieKV["editTLEM"]);
  }
  // set target concept
  var tconcField = document.getElementById("tConcept");
  if (cookieKV["editTCONC"].valueOf() != "undefined") { 
    tconcField.value = decodeURIComponent(cookieKV["editTCONC"]);
  }
  // set target frame
  var tfrmField = document.getElementById("tFrame");
  if (cookieKV["editTFRM"].valueOf() != "undefined") { 
    tfrmField.value = decodeURIComponent(cookieKV["editTFRM"]);
  }
  // set cm
  var cmField = document.getElementById("cm");
  if (cookieKV["editCM"].valueOf() != "undefined") { 
    cmField.value = decodeURIComponent(cookieKV["editCM"]);
  }
  // hide the next button
  document.getElementById("next").setAttribute("hidden", true);
  // hide the clear button
  var clearButtons = document.getElementsByClassName('clear');
  clearButtons[0].setAttribute("hidden",true);
  // alter the add LM button
  var lmButtons = document.getElementsByClassName('newLM');
  lmButtons[0].value = "Edit LM";
  lmButtons[0].onclick = function () {console.log("New function for LM in edit mode!")};
}
//console.log(location.search.substring(1,location.search.length).split("&")[1]);
//document.cookie="addSentenceValue=This is a sample value ; expires=Sat, 13 Dec 2014 12:00:00 UTC; path=/";
</script>
