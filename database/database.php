<?php

class database {
    /*     * * mysql hostname ** */

    protected $hostname = 'localhost';

    /*     * * mysql username ** */
    protected $username = 'root';

    /*     * * mysql password ** */
    protected $password = 'root';

    public function __construct() {
        $hostname = 'localhost';

        /*         * * mysql username ** */
        $username = 'root';

        /*         * * mysql password ** */
        $password = 'root';
        try {
            $dbh = new PDO("mysql:host=$hostname;dbname=SlimApi", $username, $password);
            /*             * * echo a message saying we have connected ** */
            return $dbh;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>