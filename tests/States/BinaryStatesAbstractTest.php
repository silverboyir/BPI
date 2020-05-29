<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use BPI\States\Abstracts\BinaryStatesAbstract;
use BPI\States\Models\St0;

final class BinaryStatesAbstractTest extends TestCase
{

    /**
     * @var BinaryStatesAbstract
     */
    private $instance;
    public function setUp() : void
    {
        parent::setUp();
        $this->instance = new St0();
    }

    public function testValidation(){



        $this->assertEquals(
            true,
            $this->instance->isInputValid('1'),
            'should return true for 0 and 1'
        );

        $this->assertEquals(
            true,
            $this->instance->isInputValid('0'),
            'should return true for 0 and 1'
        );

        $this->assertEquals(
            false,
            $this->instance->isInputValid(''),
            'should return false for any other value'
        );

    }

    public function testRunMethod(){
        $this->assertEquals( St0::$name, $this->instance->run('0'), 'shoud run without error');

        $this->expectException(\InvalidArgumentException::class, 'shoud throw error on invalid data');

         $this->instance->run('');
    }

    public function testReturnNextStateMethod(){

        $this->expectException(\Exception::class, 'shoud throw error when run method is not called yet');
        $this->instance->returnNextState();

        $this->instance = new St0();
        $this->instance->run('1');
        $this->instance->returnNextState();
        $this->assertTrue(true);

    }
}