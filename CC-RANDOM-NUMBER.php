<?php

/**
 * Random CC Number Generator - Z3R0-K x Mari Partner
 * Optimized for speed and offline usage.
 */

class CCGenerator {

    // Luhn Algorithm to generate valid CC numbers
    public static function generate($bin, $length = 16) {
        $bin = preg_replace('/[^0-9]/', '', $bin);
        $binLen = strlen($bin);
        $padLen = $length - $binLen - 1; // -1 for check digit

        if ($padLen < 0) {
             // If BIN is too long, just truncate/use it (simplified)
             // or return error. For this tool, we'll just cut it or append random.
             $record = substr($bin, 0, $length - 1);
        } else {
            $record = $bin . self::randomNumeric($padLen);
        }

        $checkDigit = self::calculateLuhnCheckDigit($record);
        return $record . $checkDigit;
    }

    private static function randomNumeric($length) {
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= mt_rand(0, 9);
        }
        return $str;
    }

    private static function calculateLuhnCheckDigit($number) {
        $sum = 0;
        $alt = true;
        for ($i = strlen($number) - 1; $i >= 0; $i--) {
            $n = intval($number[$i]);
            if ($alt) {
                $n *= 2;
                if ($n > 9) {
                    $n -= 9;
                }
            }
            $sum += $n;
            $alt = !$alt;
        }
        $remainder = $sum % 10;
        return ($remainder === 0) ? 0 : 10 - $remainder;
    }

    public static function generateExpDate() {
        $month = str_pad(mt_rand(1, 12), 2, '0', STR_PAD_LEFT);
        $year = mt_rand(date('Y') + 1, date('Y') + 5);
        return "$month|$year";
    }

    public static function generateCVV($type = 'visa') {
        // Simple logic: Amex 4 digits, others 3
        return mt_rand(100, 999);
    }
}

class IdentityGenerator {
    private static $names = [
        "James Smith", "Michael Smith", "Robert Smith", "Maria Garcia", "David Smith",
        "Maria Rodriguez", "Mary Smith", "Maria Hernandez", "Maria Martinez", "James Johnson",
        "John Smith", "Robert Johnson", "David Johnson", "Michael Williams", "Mary Johnson",
        "David Williams", "Michael Brown", "James Jones", "Maria Garcia", "Robert Brown",
        "John Johnson", "James Williams", "Maria Lopez", "James Brown", "Mari Partner", "Zero K"
    ];

    private static $streets = [
        "Main St", "High St", "Broadway", "Park Ave", "5th Ave", "Madison Ave",
        "Oak St", "Pine St", "Maple St", "Cedar St", "Elm St", "Washington St"
    ];

    private static $cities = [
        "New York", "Los Angeles", "Chicago", "Houston", "Phoenix",
        "Philadelphia", "San Antonio", "San Diego", "Dallas", "San Jose"
    ];

    private static $states = ["NY", "CA", "IL", "TX", "AZ", "PA", "TX", "CA", "TX", "CA"];

    public static function getRandomIdentity() {
        $name = self::$names[array_rand(self::$names)];
        $streetDiff = mt_rand(10, 9999);
        $street = self::$streets[array_rand(self::$streets)];
        $city = self::$cities[array_rand(self::$cities)];
        $state = self::$states[array_rand(self::$states)];
        $zip = mt_rand(10001, 99999);

        return [
            'name' => $name,
            'address' => "$streetDiff $street, $city, $state $zip",
            'phone' => "+1-" . mt_rand(200, 999) . "-" . mt_rand(200, 999) . "-" . mt_rand(1000, 9999),
            'email' => strtolower(str_replace(' ', '.', $name)) . mt_rand(10, 99) . "@gmail.com"
        ];
    }
}

// --- MAIN UI ---

// Colors
$green = "\033[92m";
$red = "\033[91m";
$cyan = "\033[36m";
$yellow = "\033[93m";
$bold = "\033[1m";
$white = "\033[0m";
$blue = "\033[34m";

system("clear");

echo $red . "
   __                 _                         _
  / /  ___   ___ __ _| |   /\  /\___  __ _ _ __| |_
 / /  / _ \ / __/ _` | |  / /_/ / _ \/ _` | '__| __|
/ /__| (_) | (_| (_| | | / __  /  __/ (_| | |  | |_
\____/\___/ \___\__,_|_| \/ /_/ \___|\__,_|_|   \__|
" . $white . "\n";

echo $cyan . "     >> Z3R0-K x Mari Partner <<     \n";
echo $yellow . "     >> RANDOM CC GENERATOR (OFFLINE) <<     \n\n";

echo $white . "============================================\n";
echo $green . " [+] Coder   : Kyuoko\n";
echo $green . " [+] Team    : Z3R0-K | Mari Partner\n";
echo $green . " [+] Date    : " . date('d-M-Y H:i') . "\n";
echo $white . "============================================\n";

echo $bold . $white . "[?] Enter BIN (Leave empty for random): ";
$binInput = trim(fgets(STDIN));
if (empty($binInput)) {
    $binInput = "4543" . mt_rand(10, 99); // Default random VISA
}
// Clean BIN input
$binInput = preg_replace('/[^0-9x]/i', '', $binInput);
// If it contains 'x', we treat it as a pattern, but for this simple version
// we'll just take the numeric prefix.
$binClean = str_replace('x', '', strtolower($binInput));
if (empty($binClean)) $binClean = "454321";


echo $bold . $white . "[?] Count (How many to generate): ";
$count = trim(fgets(STDIN));
if (empty($count) || !is_numeric($count)) $count = 10;

echo $bold . $white . "[?] Delay (seconds, 0 for instant): ";
$delay = trim(fgets(STDIN));
if (empty($delay) || !is_numeric($delay)) $delay = 0;

echo $cyan . "\n====== RESULT [$binInput] ======\n";

for ($i = 0; $i < $count; $i++) {
    $cc = CCGenerator::generate($binClean, 16);
    $exp = CCGenerator::generateExpDate();
    $cvv = CCGenerator::generateCVV();
    $identity = IdentityGenerator::getRandomIdentity();

    echo $white . "------------------------------------------------\n";
    echo $yellow . " CARD    : " . $green . "$cc|$exp|$cvv\n";
    echo $yellow . " NAME    : " . $white . $identity['name'] . "\n";
    echo $yellow . " ADDRESS : " . $white . $identity['address'] . "\n";
    echo $yellow . " EMAIL   : " . $white . $identity['email'] . "\n";
    echo $yellow . " PHONE   : " . $white . $identity['phone'] . "\n";

    if ($delay > 0) sleep($delay);
}

echo $cyan . "\n================ END RESULT ================\n";
echo $white . "\n";