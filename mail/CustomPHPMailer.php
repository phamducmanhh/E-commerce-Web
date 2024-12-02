<?php
namespace PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\PHPMailer;

class CustomPHPMailer extends PHPMailer {
    public static function isValidHost($host) {
        // Sử dụng FILTER_VALIDATE_DOMAIN nếu có hỗ trợ, nếu không sử dụng FILTER_VALIDATE_URL
        if (defined('FILTER_VALIDATE_DOMAIN')) {
            return (bool) filter_var($host, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME);
        } else {
            return (bool) filter_var($host, FILTER_VALIDATE_URL);
        }
    }

    protected function serverHostname() {
        $result = 'localhost.localdomain';
        if (!empty($this->Hostname)) {
            $result = $this->Hostname;
        } elseif (isset($_SERVER) && array_key_exists('SERVER_NAME', $_SERVER) && self::isValidHost($_SERVER['SERVER_NAME'])) {
            $result = $_SERVER['SERVER_NAME'];
        } elseif (function_exists('gethostname') && self::isValidHost(gethostname())) {
            $result = gethostname();
        } elseif (php_uname('n') !== false) {
            $result = php_uname('n');
        }
        return $result;
    }
}
?>
