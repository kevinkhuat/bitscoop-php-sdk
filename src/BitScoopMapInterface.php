<?php

namespace BitScoop;

/**
 * A BitScoop API Map.
 *
 * @class
 */
interface BitScoopMapInterface extends BitScoopBaseInterface{

  /**
   * Creates a Connection from this Map, with optional data.
   * Can call a callback function if specified, otherwise returns a Promise.
   *
   * @param object data The data to pass to the API call.
   * @param callback cb A callback function
   * @returns {Promise}
   */
  public function createConnection($data, $cb);

  /**
   * Deletes a Map specified by the ID.
   * Can call a callback function if specified, otherwise returns a Promise.
   *
   * @param object cb A callback function
   * @returns {Promise}
   */
  public function delete($cb);

  /**
   * Saves the Map by making a PUT request.
   * Can call a callback function if specified, otherwise returns a Promise.
   *
   * @param object cb A callback function
   * @returns {Promise}
   */
  public function save($cb);
}