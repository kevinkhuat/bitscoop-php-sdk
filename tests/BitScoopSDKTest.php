<?php
namespace BitScoop\Test;

use BitScoop\BitScoopSDK;
use PHPUnit\Framework\TestCase;


class BitScoopSDKTest extends TestCase
{
    public function testBitScoopSDKConstructor() {
        $bitScoopSDK = new BitScoopSDK();
        $this->assertTrue(true);
    }
}
