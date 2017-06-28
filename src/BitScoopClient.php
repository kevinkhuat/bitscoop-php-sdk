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
     * - token: (string) Token to access api
     * - hostname: (string) base url when hitting the api
     * - protocol: (string) protocol to use when accessing the api
     * - port: (int) port to access the authorized
     * - allowUnauthorized: (string)
     * @param array $options
     */
    public function __construct($options = [])
    {
        // Check for a valid token
        assert(isset($options['token']), 'An API key is required.');
        assert(is_string($options['token']), 'API key must be a string');

        if (isset($options['allowUnauthorized']))
        {
            assert(is_bool($options['allowUnauthorized']), 'allowUnauthorized must be a boolean.');
        }

        // Set instance variables
        $this->token = $options['token'];
        $this->hostname = isset($options['hostname']) ? $options['hostname'] : 'api.bitscoop.com';
        $this->allowUnauthorized = isset($options['allowUnauthorized']) ? $options['allowUnauthorized'] === true : false;
        $this->protocol = isset($options['protocol']) ? $options['protocol'] : 'https';

        assert($this->protocol === 'https' || $this->protocol === 'http', 'protocol must be http or https');

        if ($this->protocol === 'https')
        {
            $this->port = isset($options['port']) ? $options['port'] : 443;
        }
        else if ($this->protocol === 'http')
        {
            $this->port = isset($options['port']) ? $options['port'] : 80;
        }
    }

    public function api($id, $token)
    {
        // TODO: Implement api() method.
    }

    public function createConnection($mapId, $data, $cb = null)
    {
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
        $this->callApi($options, function($err, $response, $body) use (&$result)
        {
            if ($err)
            {
            }
            else
            {
                $result = [$response, $body];
            }
        });

        // TODO - check to see if the status code is 200

        $responseBody = $result[1];
        $connection = new BitScoopConnection($responseBody);

        print_r($connection->results);
//        $cb($connection);
    }

    public function deleteConnection($connectionId, $cb)
    {
        $results = [];
        $options = [
          'protocol'          => $this->protocol,
          'method'            => 'DELETE',
          'path'              => '/connections/' . $connectionId,
          'port'              => $this->port,
          'hostname'          => $this->hostname,
          'headers'           => [
            'Authorization' => 'Bearer ' . $this->token
          ],
          'allowUnauthorized' => $this->allowUnauthorized
        ];
        $this->callApi($options, function($err, $response, $body) use (&$results)
        {
            if ($err)
            {
                // reject
            }
            else
            {
                // resolve
                $results = [$body, $response];
            }
        });

        // TODO - check to see if the status code is 200
        list($body, $response) = $results;
//        $cb(null, null);
    }

    public function getConnection($connectionId, $cb)
    {
        $results = [];
        $options = [
          'protocol'          => $this->protocol,
          'method'            => 'GET',
          'path'              => '/connections/' . $connectionId,
          'port'              => $this->port,
          'hostname'          => $this->hostname,
          'headers'           => [
            'Authorization' => 'Bearer ' . $this->token
          ],
          'allowUnauthorized' => $this->allowUnauthorized
        ];
        $this->callApi($options, function($err, $response, $body) use (&$results)
        {
            if ($err)
            {
                // reject
            }
            else
            {
                // resolve
                $results = [$body, $response];
            }
        });

        // TODO - check to see if the status code is 200
        list($body, $response) = $results;
        $connection = new BitScoopConnection($body);
        //
//        $cb(null, $connection);
    }

    public function createMap($data, $cb)
    {
        $results = [];
        $options = [
          'protocol'          => $this->protocol,
          'method'            => 'POST',
          'path'              => '/maps',
          'port'              => $this->port,
          'hostname'          => $this->hostname,
          'headers'           => [
            'Authorization' => 'Bearer ' . $this->token
          ],
          'allowUnauthorized' => $this->allowUnauthorized
        ];
        $this->callApi($options, function($err, $response, $body) use (&$results)
        {
            if ($err)
            {
                // reject
            }
            else
            {
                // resolve
                $results = [$body, $response];
            }
        });
        
        // TODO - check to see if the status code is 200
        list($body, $response) = $results;

        $map = new BitScoopMap($body);

        //$cb(null, $map);
    }

    public function deleteMap($mapId, $cb)
    {
        // TODO: Implement deleteMap() method.
    }

    public function getMap($mapId, $cb)
    {
        // TODO: Implement getMap() method.
    }
}