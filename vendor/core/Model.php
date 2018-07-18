<?php

class Model
{
    public $data = [];
    public $jdata = [];

    public function __construct()
    {

        $db = require ROOT.'/config/config_db.php';
        
        R::setup( $db['dsn'], $db['user'], $db['password']);

        if ( !R::testConnection() )
        {
            exit ('We don\'t have connection...' );
        }
    }
    
    public function get_data()
    {
        $data = array_map("str_getcsv", file(DATA."customers.csv",FILE_SKIP_EMPTY_LINES));
        $keys = array_shift($data);
        foreach ($data as $i=>$row) {
            $data[$i] = array_combine($keys, $row);
        }
        return $this->data=$data;
    }

    public function save_data(){
        $this->get_data();

        foreach ($this->data as $row)
        {
            $tbl = R::dispense('test');
            foreach ($row as $key=>$item){
                $key = str_replace('id', 'user_id',$key);
                $tbl->{$key} = $item;
            }
            $tbl = R::store($tbl);
        }
    }

    public function load_data(){

        $this->jdata = R::findAll('test');
        $newdata = json_encode($this->jdata);
        $file = fopen(DATA.'data.json', 'w');
        fwrite($file, $newdata);
        fclose($file);
    }
}