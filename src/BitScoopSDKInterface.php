<?php
namespace BitScoop;

interface BitScoopSDKInterface extends BitScoopBaseInterface {

  /**
   * Creates and returns an instance of BitScoopAPI for a specific API map.
   * If also provided with a token, it will use that token when making calls, otherwise it uses the token used to instantiate the SDK instance.
   *
   * @param string id The ID of the API map.
   * @param array token  A BitScoop API Key, overrides the one used to create the SDK instance.
   * @returns \Bitscoop\BitScoopAPIInterface An instance of a BitScoop API with callable methods mapping to the API map.
   */
  public function api($id, $token);

  /**
   * Creates a Connection from the given mapId, with optional data.
   * Can call a callback function if specified, otherwise returns a Promise.
   *
   * @param string mapId The map ID
   * @param object data The data to pass to the API call.
   * @param callback cb {Function} A callback function
   * @returns {Promise}
   */
  public function createConnection($mapId, $data, $cb);

  /**
   * Deletes a Connection from the given mapId.
   * Can call a callback function if specified, otherwise returns a Promise.
   *
   * @param string connectionId The map ID
   * @param callback cb A callback function
   * @returns {Promise}
   */
  public function deleteConnection($connectionId, $cb);

  /**
   * Gets a Connection specified by the ID.
   * Can call a callback function if specified, otherwise returns a Promise.
   *
   * @param string connectionId The map ID
   * @param callback cb A callback function
   * @returns {Promise}
   */
  public function getConnection($connectionId, $cb);

  /**
   * Creates a new API map from the data passed in.
   * Can call a callback function if specified, otherwise returns a Promise.
   *
   * @param object data The data used to create the new Map.
   * @param callback cb A callback function
   * @returns {Promise}
   */
  public function createMap($data, $cb);

  /**
   * Deletes a Map specified by the ID.
   * Can call a callback function if specified, otherwise returns a Promise.
   *
   * @param string mapId The map ID
   * @param object cb A callback function
   * @returns {Promise}
   */
  public function deleteMap($mapId, $cb);

  /**
   * Gets a Map specified by the ID.
   * Can call a callback function if specified, otherwise returns a Promise.
   *
   * @param string mapId The map ID
   * @param object cb A callback function
   * @returns {Promise}
   */
  public function getMap($mapId, $cb);
}

