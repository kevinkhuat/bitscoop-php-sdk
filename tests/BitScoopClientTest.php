<?php
namespace BitScoop\Test;

use BitScoop\BitScoopClient;
use PHPUnit\Framework\TestCase;

define('BITSCOOP_TOKEN', '');
define('BITSCOOP_PROVIDER_ID', '');

class BitScoopClientTest extends TestCase
{
    private $client;

    public function testGetBitScoopClient()
    {
        if (!$this->client) {
            $this->client = $this->createBitScoopClient();
        }
        return $this->client;
    }

    public function createBitScoopClient() {
        $options = [
          'token' => BITSCOOP_TOKEN
        ];
        $bitscoop = new BitScoopClient($options);

        $this->assertInstanceOf(BitScoopClient::class, $bitscoop);
        return $bitscoop;
    }

    public function testCreateConnection() {
        $client = $this->testGetBitScoopClient();
        $client->createConnection(BITSCOOP_PROVIDER_ID,"","");

        $this->assertTrue(true);
    }

}
