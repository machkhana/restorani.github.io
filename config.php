<?php
//Errors
error_reporting(E_ALL);
//Folders DIR//
defined("CLASS_PATH") or define("CLASS_PATH", realpath(dirname(__FILE__) .'/class'));
defined("MODULES") or define("MODULES", realpath(dirname(__FILE__).'/modules'));
defined("PARTIALS") or define("PARTIALS", realpath(dirname(__FILE__).'/partials'));
defined("CONTROLLER") or define("CONTROLLER", realpath(dirname(__FILE__).'/class/controller'));
defined("PAGES") or define("PAGES", realpath(dirname(__FILE__).'/pages'));
defined("REQUESTS") or define("REQUESTS", realpath(dirname(__FILE__).'/class/requests'));
//define('DESTINATION', 'images/big');
define('RESIZEBY_LARGE', 'w');
define('RESIZETO_LARGE', 600);
define('QUALITY_LARGE', 300);
define('RESIZEBY_EXLARGE', 'w');
define('RESIZETO_EXLARGE', 1920);
define('QUALITY_EXLARGE', 300);
//--------- patara suratis zomebi -------//
//define('DESTINATION', 'images/small');
define('RESIZEBY_SMALL', 'w');
define('RESIZETO_SMALL', 150);
define('QUALITY_SMALL', 300);
// Connect DB
require_once (CLASS_PATH.'/conn.php');
require_once (CLASS_PATH.'/targets.php');
// Category
require_once (CONTROLLER.'/MenuController.php');
require_once(CONTROLLER . '/BrandController.php');
//language side
//$l = '';
$c='';
$view='';
$st='';
$pers='';
$message='';
//require_once (MODULES.'/lang.php');
//if(isset($_GET['l'])){$l=$sql->real_escape_string($_GET['l']);}
if(isset($_GET['p'])){$p=$sql->real_escape_string($_GET['p']);}
if(isset($_GET['view'])){$view=$sql->real_escape_string($_GET['view']);}
if(isset($_GET['c'])){$c=$sql->real_escape_string($_GET['c']);}
if(isset($_GET['st'])){$st=$sql->real_escape_string($_GET['st']);}
if(isset($_GET['user'])){$pers=$sql->real_escape_string($_GET['user']);}
// array //
$month = array('01','02','03','04','05','06','07','08','09','10','11','12');
$monthname = array('იანვარი','თებერვალი','მარტი','აპრილი','მაისი','ივნისი','ივლისი','აგვისტო','სექტემბერი','ოქტომბერი','ნოემბერი','დეკემბერი');
$month2 = array('','იანვარი','თებერვალი','მარტი','აპრილი','მაისი','ივნისი','ივლისი','აგვისტო','სექტემბერი','ოქტომბერი','ნოემბერი','დეკემბერი');
$year = date('Y');
?>
