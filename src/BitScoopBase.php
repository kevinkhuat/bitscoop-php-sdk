<?php
namespace BitScoop;

use \GuzzleHttp;
use \GuzzleHttp\Psr7;
use \GuzzleHttp\RequestOptions;

class BitScoopBase implements BitScoopBaseInterface
{
  
  public function callApi($options, $cb)
  {

    // begin of callable
    $urlParts = [
      'protocol' => $options['protocol'],
      'hostname' => $options['hostname']
    ];

    if (isset($options['path'])) {
      $urlParts['pathname'] = $options['path'];
    }

    if (isset($options['port'])) {
      $urlParts['port'] = $options['port'];
    }

    if (isset($options['query'])) {
      $urlParts['query'] = $options['query'];
    }

    $uri = $urlParts['protocol'] . '://' . $urlParts['hostname'] . ':' . $urlParts['port'] . $urlParts['pathname'];
    $method = isset($options['method']) ? $options['method'] : 'GET';
    $requestOptions = [
      'headers' => $options['headers']
    ];


    if ($options['body']) {
      $requestOptions['body'] = json_encode($options['body']);

      if (isset($requestOptions['headers']['Content-Type'])) {
        $requestOptions['headers']['Content-Type'] = 'application/json';
      }
    }

    $client = new GuzzleHttp\Client();
    $response = $client->request($method, $uri, $requestOptions);
    $body =  GuzzleHttp\json_decode($response->getBody());
    $cb(null, $response, $body);
  }
}