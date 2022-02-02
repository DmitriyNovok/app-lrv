<?php

namespace Tests\Unit;

use App\Http\Controllers\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    protected function tearDown(): void
    {
        $this->calculator = NULL;
    }

    public function testSum()
    {
        $result = $this->calculator->sum(1, 2);
        $this->assertEquals(3, $result);
    }

    public function addDataProvider()
    {
        return [
            [1, 2, 3],
            [0, 0, 0],
            [-1, -1, -2],
        ];
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $result = $this->calculator->sum($a, $b);
        $this->assertEquals($expected, $result);
    }

    public function testWithStub()
    {
        // Create a stub for the Calculator class.
        $calculator = $this->getMockBuilder(Calculator::class)->getMock();

        // Configure the stub.
        $calculator->expects($this->any())
            ->method('sum')
            ->will(
                $this->returnValue(6)
            );

        $this->assertEquals(6, $calculator->sum(100,100));
    }
}
