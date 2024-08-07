<?php 
// Site Settings 
$siteName = 'Megha Rao Website'; 
$siteEmail = 'contactmegharao@gmail.com'; 
 
$siteURL = ($_SERVER["HTTPS"] == "on")?'https://megharao.in':'http://megharao.in'; 
$siteURL = $siteURL.$_SERVER["https://megharao.in"].dirname($_SERVER['REQUEST_URI']); 
 
// Database configuration 
define('DB_HOST', '182.50.135.64');  
define('DB_USERNAME', 'megha');  
define('DB_PASSWORD', 'Star1@3');  
define('DB_NAME', 'megha_rao_db'); 