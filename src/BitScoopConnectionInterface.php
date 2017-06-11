<?php

namespace BitScoop;

interface BitScoopConnectionInterface extends BitScoopBaseInterface{

  /**
   * Deletes the Connection.
   * Can call a callback function if specified, otherwise returns a Promise.
   *
   * @param object cb A callback function
   * @returns {Promise}
   */
  public function delete($cb);

  /**
   * Saves the Connection by making a PATCH request.
   * Can call a callback function if specified, otherwise returns a Promise.
   *
   * @param object cb A callback function
   * @returns {Promise}
   */
  public function save($cb);
}