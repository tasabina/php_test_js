<?php

class Model
{
    public function __construct()
    {

        $db = require ROOT.'/config/config_db.php';
        
        R::setup( $db['dsn'], $db['user'], $db['password']);

        if ( !R::testConnection() )
        {
            exit ('We don\'t have connection...' );
        }
    }

    function index(){}

}
