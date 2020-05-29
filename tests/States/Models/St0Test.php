<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use BPI\States\Models\St0;
use BPI\States\Models\St1;

final class St0Test extends TestCase
{
    private $instance;
    public function setUp() : void
    {
        parent::setUp();
        $this->instance = new St0();
    }

    public function testNextState(){
        $this->assertEquals(St0::$name, $this->instance->run(0));
        $this->assertEquals(St1::$name, $this->instance->run(1));
    }
}