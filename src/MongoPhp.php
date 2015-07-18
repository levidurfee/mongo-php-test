<?php namespace teklife;

class MongoPhp
{
    protected $m;
    protected $db;

    public function __construct()
    {
        $configSet = false;
        $config = '..' . DIRECTORY_SEPARATOR . 'config.php';
        if(file_exists($config)) {
            $configSet = true;
            require_once($config);
        }

        if($configSet) {
            try {
                $this->m = new \MongoClient("mongodb://" . MONGO_DB_UN . ":" . MONGO_DB_PW . "@" . MONGO_DB_IP . "/Website");
            } catch (\Exception $e) {
                echo "Couldn't connect.";
                exit;
            } catch (\MongoConnectionException $e) {
                echo "Couldn't connect.";
                exit;
            }
        } else {
            $this->m = new \MongoClient();
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