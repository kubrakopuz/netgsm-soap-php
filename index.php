<?php
include "soapClass.php";
$soap = new soapClass();



$soap->usernm="xx";
$soap->pwd="xxx";
$soap->header="xx";
$soap->message="xxx";
$soap->gsm=array("X"); // array('905xxxxxxxxx','905xxxxxxxxy' , '905xxxxxxxxz' );
$soap->filter="";
$soap->startdate="";
$soap->stopdate="";
$soap->encoding="";

////$var=1 1:n format, $var=2 n:n format
/*  1:N MESSAGE SEND */
//print_r($soap->sendmsg(1));//
/*  1:N MESSAGE SEND */


/*  N:N MESSAGE SEND */
$soap->message=array("2.msg1","2.msg1");
$soap->gsm=array("XX","XX");
print_r($soap->sendmsg(2));// $var=1 1:n format, $var=2 n:n format
/*  N:N MESSAGE SEND */

