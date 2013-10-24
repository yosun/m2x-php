<?php

include_once "lib/m2x.php";

$m2x = new M2X("<API KEY HERE>");

//VIEW FEED
$response = $m2x->feeds()->view("<FEED>");

//LIST STREAMS
$response = $m2x->feeds()->streams("<FEED>");

//GET DETAILS FROM EXISTING STREAM
$response = $m2x->feeds()->stream("<FEED>", "<STREAM NAME>");
  
//READ VALUES FROM EXISTING STREAM
$response = $m2x->feeds()->stream_values("<FEED>", "<STREAM NAME>");

//POST VALUES FROM EXISTING STREAM

//METHOD 1
$response = $m2x->feeds()->add_stream_values("<FEED>", "<STREAM NAME>", array(
  array("value" => "<VALUE>"),
  array("value" => "<VALUE>"),
  array("value" => "<VALUE>")
));
//METHOD 2
$response = $m2x->feeds()->update_stream("<FEED>", "<STREAM NAME>", array("value" => "<VALUE>"));

//READ LOCATION INFORMATION
$response = $m2x->feeds()->location("<FEED>");

//UPDATE LOCATION INFORMATION
$response = $m2x->feeds()->update_location("<FEED>", array(
  "name" => "<NAME>",
  "latitude" => "<LATITUDE>",
  "longitude" => "<LONGITUDE>",
  "elevation" => "<ELEVATION>"
));


// RESPONSE OBJECT  
$code = $response.code(); //HTTP STATUS CODE
$header = $response.headers(); //RESPONSE HEADER
$raw = $response.raw(); //RAW BODY
$json = $response.json(); //PARSED BODY
