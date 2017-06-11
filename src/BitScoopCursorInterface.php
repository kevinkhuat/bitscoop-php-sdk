<?php
namespace BitScoop;

interface BitScoopCursorInterface {

  /**
   * Sets the endpoint name and returns the callable cursor.
   *
   * @param string name The name of the endpoint to be called.
   * @returns object
   */
  public function endpoint($name);

  /**
   * Sets the verb and returns the callable cursor.
   *
   * @param string verb The verb to use when making the call.
   * @returns object
   */
  public function method($verb);
}