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
//        $client->createConnection(BITSCOOP_PROVIDER_ID,[],"");

//        $client->getConnection('500eaf2301a4497f84ed2aff64fd9123', "");
//        $client->deleteConnection('68aa27b1c0834dac8b9a4d57b7836096', "");

        $this->assertTrue(true);
    }

}
