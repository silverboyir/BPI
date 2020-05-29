<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use BPI\Machine;
use BPI\States\Models\St0;
use BPI\States\States;

final class MachineTest extends TestCase
{
    private $writer;
    public function setUp() : void
    {
        parent::setUp();
        $this->writer = \BPI\Outputs\Output::factory('\BPI\Outputs\Adapters\NullOutput');
    }

    public function testRun(){
        $this->assertEquals(
            0,
            (new Machine(110,States::factory(St0::$name), $this->writer))->run(), 'With 110 should return 0');

        $this->assertEquals(
            1,
            (new Machine(1010,States::factory(St0::$name), $this->writer))->run(), 'With 1010 should return 1');
    }

    public function testValidator(){

        $stub = $this->createMock(St0::class);
        $stub->method('isFinal')
             ->willReturn(false);


        $this->assertEquals(
            false,
            (new Machine('',$stub, $this->writer))->run(), 'bacuse the start state is not final it should return false wih enpty input');
        
    }
}