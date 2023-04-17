<?php
# DEFAULT URL
error_reporting(0);
define("MESSAGE","Hello JavaTpoint PHP");  
define("FOLDER","/chatgpt");
if ((!$_SERVER["HTTPS"]) || ($_SERVER["HTTPS"] == "off")) {
    define("HTTPS_MODE", "off");
    define("DEFAULT_URL", "http://".$_SERVER["HTTP_HOST"].FOLDER);
    define("MAIN_URL", "http://".$_SERVER["HTTP_HOST"]);
} else {
    define("HTTPS_MODE", "on");
    define("DEFAULT_URL", "https://".$_SERVER["HTTP_HOST"].FOLDER);
    define("MAIN_URL", "https://".$_SERVER["HTTP_HOST"]);
}
 ?>