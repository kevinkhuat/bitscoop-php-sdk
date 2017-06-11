<?php

namespace BitScoop;

interface BitScoopAPIInterface extends BitScoopBaseInterface, BitScoopCursorInterface{

  /**
   * Returns a callable cursor with the endpoint set to the input `name`.
   *
   * @param string name
   * @returns {cursor}
   */
  public function endpoint($name);

  /**
   * Returns a callable cursor with the method set to the input `verb`.
   *
   * @param string verb
   * @returns {cursor}
   */
  public function method($verb);
}