<?PHP
// -- SITE SETTINGS --
ini_set('memory_limit', '-1');
ini_set("display_errors", 1);


define("ADMIN","Administratie Panel");

// -- DATABASE SETTINGS --
define("DB_HOST","ec2-23-21-246-11.compute-1.amazonaws.com");
define("DB_USERNAME","vxhqizqwmfqzpo");
define("DB_PASSWORD",'d5249108238df98cc3412153f52fb556e3a84a32261e12d5bc7db8aae8130693');
define("DB_DATABASE","d1n4fevo38j8hs");

define('PERPAGE',9);
define( "SEO" ,0);
define("FILE_PATH",dirname(__FILE__)."/");

// -- TABLES --
define("TABLE_PREFIX","");
define("TBL_PREFIX","");


date_default_timezone_set("Asia/Kolkata"); 

?>