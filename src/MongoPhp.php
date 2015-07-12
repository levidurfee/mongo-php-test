<?php namespace teklife;


class MongoPhp
{
    protected $m;
    protected $db;

    public function __construct()
    {
        $this->m = new \MongoClient();
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