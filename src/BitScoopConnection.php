<?php
namespace BitScoop;

class BitScoopConnection extends BitScoopBase implements BitScoopConnectionInterface {

    public $results = [];

    /**
     * Parses a Connection into its editable fields.
     *
     * @constructor
     * @param data array The raw response from fetching a Connection.
     */
    public function __construct($data)
    {
        foreach ($data as $key => $value)
        {
            if ($key !== 'created' && $key !== 'updated' && $key !== 'endpoint_data')
            {
                $this->results[$key] = $value;
            }
        }

    }

    public function save($cb)
    {
        // TODO: Implement save() method.
    }

    public function delete($cb)
    {
        // TODO: Implement delete() method.
        //let sdk = sdkConnectionRef[this.id];
        //return sdk.deleteConnection(this.id, cb);
    }
}
