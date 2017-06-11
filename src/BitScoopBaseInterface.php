<?php

namespace BitScoop;

// I noticed that all classes were calling callApi.
// So I created a base interface that all interfaces
// will extend
/**
 * Interface BitScoopBaseInterface
 * @package BitScoop
 */
interface BitScoopBaseInterface {

  /**
   * Calls the BitScoop API.
   *
   * @param object options Options to use in making the call.
   * @param function cb The callback function to call when finished.
   * @returns {Promise}
   */
  public function callApi($options, $cb);
}