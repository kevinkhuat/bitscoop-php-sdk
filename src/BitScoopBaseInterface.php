<?php
/**
 * BitScoopBaseInterface
 *
 * @category Class
 * @package  BitScoop
 * @author   BitScoop
 * @license  https://github.com/bitscooplabs/bitscoop-nodejs-sdk/blob/master/LICENSE BitScoop Labs
 * @link     https://github.com/bitscooplabs/bitscoop-nodejs-sdk/blob/master
 *
 */

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