<?PHP
// -- SITE SETTINGS --
ini_set('memory_limit', '-1');
ini_set("display_errors", 1);

define("ADMIN","Administratie Panel");
// -- DATABASE SETTINGS --
$url = parse_url("postgres://vxhqizqwmfqzpo:d5249108238df98cc3412153f52fb556e3a84a32261e12d5bc7db8aae8130693@ec2-23-21-246-11.compute-1.amazonaws.com:5432/d1n4fevo38j8hs");
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
define("DB_HOST",$server);
define("DB_USERNAME",$username);
define("DB_PASSWORD",$password);
define("DB_DATABASE",$db);
define('PERPAGE',9);
define( "SEO" ,0);
define("FILE_PATH",dirname(__FILE__)."/");

// -- TABLES --
define("TABLE_PREFIX","");
define("TBL_PREFIX","");


date_default_timezone_set("Asia/Kolkata"); 

?>
