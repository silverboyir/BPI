<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use BPI\States\Models\St1;
use BPI\States\Models\St2;
use BPI\States\Models\St0;

final class St1Test extends TestCase
{
    private $instance;
    public function setUp() : void
    {
        parent::setUp();
        $this->instance = new St1();
    }

    public function testNextState(){
        $this->assertEquals(St2::$name, $this->instance->run(0));
        $this->assertEquals(St0::$name, $this->instance->run(1));
    }
}