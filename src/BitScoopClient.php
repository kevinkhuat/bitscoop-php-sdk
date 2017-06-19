<?php
namespace BitScoop;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\RejectedPromise;
use \GuzzleHttp;
use \GuzzleHttp\Psr7;
use BitScoop\BitScoopConnection;

/**
 * Default BitScoop client implementation
 */
class BitScoopClient extends BitScoopBase implements BitScoopClientInterface
{
    /** @var string  */
    protected $token;

    /** @var string  */
    protected $hostname;

    /** @var string  */
    protected $protocol;

    /** @var int  */
    protected $port;

    /** @var string  */
    protected $allowUnauthorized;

    /**
     * Available options
     * - token: (string)
     * - hostname: (string)
     * - protocol: (string)
     * - port: (int)
     * - allowUnauthorized: (string)
     * @param array $options
     */
    public function __construct($options = []) {
        // TODO - Check for required values
        //assert 'An API key is required.'
        //assert 'API key must be a string'

        if (isset($options['allowUnauthorized'])) {
            // assert 'allowUnauthorized must be a boolean.'
        }

        $this->token = isset($options['token']) ? $options['token'] : null;
        $this->hostname = isset($options['hostname']) ? $options['hostname'] : 'api.bitscoop.com';
        $this->allowUnauthorized = isset($options['allowUnauthorized']) ? $options['allowUnauthorized'] === true : null;
        $this->protocol = isset($options['protocol']) ? $options['protocol'] : 'https';

        //assert 'protocol must be http or https'

        if ($this->protocol === 'https')
        {
            $this->port = isset($options['port']) ? $options['port'] : 443;
        }
        else if ($this->protocol === 'http')
        {
            $this->port = isset($options['port']) ? $options['port'] : 80;
        }
    }

    public function api($id, $token) {
        // TODO: Implement api() method.
    }

    public function createConnection($mapId, $data, $cb) {
        $result = [];
        $options = [
          'protocol'          => $this->protocol,
          'method'            => 'POST',
          'path'              => '/maps/' . $mapId . '/connections',
          'port'              => $this->port,
          'hostname'          => $this->hostname,
          'headers'           => [
            'Authorization' => 'Bearer ' . $this->token
          ],
          'body'              => $data,
          'allowUnauthorized' => $this->allowUnauthorized
        ];
        $this->callApi($options, function($err, $response, $body) use (&$result) {
            if ($err) {
            }
            else {
                $result = [$response, $body];
            }
        });

        // TODO - check to see if the status code is 200

        $responseBody = $result[1];
        $connection = new BitScoopConnection($responseBody);

        $cb($connection);
    }

    public function deleteConnection($connectionId, $cb) {
        // TODO: Implement deleteConnection() method.
    }

    public function getConnection($connectionId, $cb) {
        // TODO: Implement getConnection() method.
    }

    public function createMap($data, $cb) {
        // TODO: Implement createMap() method.
    }

    public function deleteMap($mapId, $cb) {
        // TODO: Implement deleteMap() method.
    }

    public function getMap($mapId, $cb) {
        // TODO: Implement getMap() method.
    }
}