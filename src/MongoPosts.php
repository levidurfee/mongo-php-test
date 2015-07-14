<?php namespace teklife;


class MongoPosts extends MongoPhp
{
    public $title;
    public $entry;
    public $author;

    public $cursor;

    protected $db;
    protected $m;

    protected $postArray;

    public function __construct()
    {
        parent::__construct();
        $this->db = parent::getDb();
        $this->collection = $this->db->Posts;
    }

    public function createPost()
    {
        $this->createEntry();
        $this->createPostArray();
        $this->collection->insert($this->postArray);
    }

    public function getAllPosts()
    {
        $this->cursor = $this->collection->find();
        return $this;
    }

    public function orderPostsDesc()
    {
        $this->cursor->sort(array('_id' => -1));
        return $this;
    }

    public function limitPosts($limit = 10)
    {
        $this->cursor->limit($limit);
    }

    protected function createPostArray()
    {
        $created = new \MongoDate();
        $this->postArray = array(
            'title'     => $this->title,
            'entry'     => $this->entry,
            'created'   => $created,
            'author'    => 'Levi',
            'uid'       => 1,
            'likes'     => array(
                'uid'   => 1,
                'uid'   => 2,
            )
        );
    }

    protected function createEntry()
    {
        $abc = 'abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789!';
        for($i=0;$i<100;$i++) {
            $this->entry .= $abc[mt_rand(0, 62)];
        }
    }
}