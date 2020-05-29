<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use BPI\States\Models\St0;
use BPI\States\States;

final class StateFactoryTest extends TestCase
{
    public function testLoadingClass(){
        $this->assertInstanceOf(
            St0::class,
            States::factory(St0::$name),
            'returned class must be instance of St0 model'
        );
    }
}