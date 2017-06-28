<?php
namespace BitScoop;

class BitScoopMap extends BitScoopBase implements BitScoopMapInterface
{
    
    public function __construct($data)
    {
        $this->id = $data[id];
    }

    public function createConnection($data, $cb)
    {
        $sdk = $this->sdkMapRef[$this->id];
        return $sdk->createConnection($this->id, $data, $cb);
    }

    public function delete($cb)
    {
        $sdk = $this->sdkMapRef[$this->id];
        $sdk->deleteMap($this->id, $cb);
    }

    public function save($cb)
    {
        $results = [];
        $json = [];
        $sdk = $this->sdkMapRef[$this->id];
        foreach($sdk as $key => $value)
        {
            if ($key !== 'id')
            {
                $json[$key] = $value;
            }
        }

        $options = [
            'protocol' => $sdk['protocol'],
            'method' => 'PUT',
            'path' => '/maps/' . $this->id,
            'port' => $sdk['port'],
            'hostname' => $sdk['hostname'],
            'headers' => [
                'Authorization' => 'Bearer ' . $sdk['token']
            ],
            'body' => $json,
            'allowUnauthorized' => $sdk['allowUnauthorized']
        ];
        
        $this->callApi($options, function($err, $response, $body) use(&$results){

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

    }
}