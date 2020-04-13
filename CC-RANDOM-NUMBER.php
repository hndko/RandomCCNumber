<?php
/*Color*/
$green = "\033[92m";
$red = "\033[91m";
$cyan = "\033[36m";
$yellow = "\033[93m";
$bold = "\033[5m";
$white = "\033[0m";
/*Form*/
$date   = date('d-M-Y H:i');
//system("clear");
echo $red . "
   __                 _                         _   
  / /  ___   ___ __ _| |   /\  /\___  __ _ _ __| |_ 
 / /  / _ \ / __/ _` | |  / /_/ / _ \/ _` | '__| __|
/ /__| (_) | (_| (_| | | / __  /  __/ (_| | |  | |_ 
\____/\___/ \___\__,_|_| \/ /_/ \___|\__,_|_|   \__|
                                                    
RANDOM CREDIT CARD NUMBER FULL INFO
More Info : https://linktr.ee/doko1554

";
echo $cyan . "============================================";
echo $bold . $green . "
Coder   : Kyuoko
Team    : UKL-TEAM | GFS-TEAM | SIS-TEAM
Code    : PHP
Version : 1\n";
echo $bold . $green . "Date    : $date\n";
echo $cyan . "============================================\n";
echo $bold . $red . "Count      : ";
$count = trim(fgets(STDIN,1024));
echo $bold . $white . "Delay      : ";
$sleep = trim(fgets(STDIN,1024));
echo $cyan . "====== RESULT CC NUMBER & INFORMATION ======\n";
for($x = 0; $x < $count; $x++){
$str = file_get_contents("http://namegenerators.org/fake-name-generator-us/");
$var = '/<div class="col2">(.*?)<\/div>/s';
preg_match_all($var, $str, $matches);
echo $red . "\n-+-+-+-+-+-+- MORE INFORMATION -+-+-+-+-+-+-\n";
echo $bold . $cyan . 
		"Name : ".str_replace("</span>", "", str_replace('<span class="name">', "", $matches[1][3]))."\n".
		"Address : ".$matches[1][8]."\n".
		"Phone : ".$matches[1][9]."";
echo $red . "\n-+-+-+-+-+-+- CARD INFORMATION -+-+-+-+-+-+-\n";
echo $bold . $cyan . "Email : ".$matches[1][10]."\n".
		"Card Number : ".str_replace(" ", "", $matches[1][14])."\n".
		"Cvv : ".$matches[1][16]."\n".
		"Exp-Date : ".$matches[1][15]."]\n";
	sleep($sleep);
echo $cyan . "\n================ END RESULT ================";
}