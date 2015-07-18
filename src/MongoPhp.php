<?php namespace teklife;
$config = '..' . DIRECTORY_SEPARATOR . 'config.php';
if(file_exists($config)) {
    require_once($config);
}

class MongoPhp
{
    protected $m;
    protected $db;

    public function __construct()
    {
        try {
            #$this->m = new \MongoClient("mongodb://" . MONGO_DB_UN . ":" . MONGO_DB_PW . "@" . MONGO_DB_IP . "/Website");
            $this->m = new \MongoClient();
        } catch(\Exception $e) {
            echo "Couldn't connect.";
            exit;
        } catch(\MongoConnectionException $e) {
            echo "Couldn't connect.";
            exit;
        }
        $this->db = $this->m->Website;
    }

    public function getDb()
    {
        return $this->db;
    }

    public function testOnce()
    {
        return true;
    }
}