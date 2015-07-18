<?php namespace teklife;
require_once('..' . DIRECTORY_SEPARATOR . 'config.php');

class MongoPhp
{
    protected $m;
    protected $db;

    public function __construct()
    {
        try {
            $this->m = new \MongoClient("mongodb://" . MONGO_DB_UN . ":" . MONGO_DB_PW . "@" . MONGO_DB_IP . "/Website");
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