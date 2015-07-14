<?php namespace teklife;


class MongoUsers extends MongoPhp
{
    public $username;
    public $password;
    public $cursor;

    protected $db;
    protected $m;

    protected $userArray;
    protected $collection;

    public function __construct()
    {
        parent::__construct();
        $this->db = parent::getDb();
        $this->collection = $this->db->Users;
    }

    public function createUser()
    {
        $this->createUserArray();
        $this->collection->insert($this->userArray);
    }

    public function getAllUsers()
    {
        $this->cursor = $this->collection->find();
        return $this;
    }

    public function orderUsersDesc()
    {
        $this->cursor->sort(array('_id' => -1));
        return $this;
    }

    public function limitUsers($limit = 10)
    {
        $this->cursor->limit($limit);
    }

    public function selectUser()
    {

    }

    protected function createUserArray()
    {
        $created = new \MongoDate();
        $password = password_hash($this->password, PASSWORD_DEFAULT);
        $randId = mt_rand(9999, 999999);
        $this->userArray = array(
            "username" => $this->username,
            "password" => $password,
            "created"  => $created,
            "randId"   => $randId
        );
    }
}