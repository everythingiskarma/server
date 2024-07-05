<?php

class Database {

    protected $host;
    protected $username;
    protected $password;
    protected $database;
    //protected $api;
    
    public function __construct() {
        //$this->api = $_POST['api'];
        $this->host = "localhost";
        $this->username = "iskarmac_udbhav";
        //$this->password = "g37wir3d";
        $this->password = "&~n;lL__L#Uu";
        //switch ($this->api) {
        switch ($_POST['api']) {
            case 'authenticator':
            case 'profile':
                $this->database = "iskarmac_users";
            break;

            case 'wallet':
                $this->database = "iskarmac_wallet";
            break;
            
            case 'dashboard':
                $this->database = 'iskarmac_dashboard';
            break;

            case 'content':
                $this->database = 'iskarmac_content';
            break;

            case 'store':
                $this->database = 'iskarmac_store';
            break;

            case 'marketing':
                $this->database = 'iskarmac_marketing';
            break;

            default:
            // code...
            break;

        }
    }
}

?>
