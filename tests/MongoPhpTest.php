<?php namespace teklife;

class MongoPhpTest extends \PHPUnit_Framework_TestCase
{
    private $mongophp;

    protected function setUp()
    {
        $this->mongophp = new MongoPhp;
    }

    protected function tearDown()
    {
        $this->mongophp = null;
    }

    public function testStupidTest()
    {
        $result = $this->mongophp->testOnce();
        $this->assertTrue($result);
    }
}