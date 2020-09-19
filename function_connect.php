<?php class Database
    {
        private static $dbName = 'dwwm20061_chat';
        private static $dbHost = 'localhost';
        private static $dbUsername = 'root';
        private static $dbUserPassword = '';
        private static $cont = null;
        public function __construct()
        {
            die('Init function is not allowed');
        }
        public static function connect()
        {
            if (null == self::$cont) {
                try {
                    self::$cont = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
                    self::$cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    self::$cont->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
            }
            return self::$cont;
        }
        public static function disconnect()
        {
            self::$cont = null;
        }
    }
?>