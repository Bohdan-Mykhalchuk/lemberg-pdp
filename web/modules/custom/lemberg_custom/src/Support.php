<?php

namespace Drupal\lemberg_custom;

/**
 * Support class for validation.
 */
class Support {

  /**
   * Validate first name.
   *
   * @param string $str
   *   The string.
   *
   * @return bool
   *   The result.
   */
  public function validFirstName($str) {
    if (strlen($str) < 3) {
      return FALSE;
    }
    else {
      if (strlen($str) > 15) {
        return FALSE;
      }
      else {
        if (strpos($str, "@")) {
          return FALSE;
        }
        else {
          if (str_contains($str, ' ')) {
            return FALSE;
          }
        }
      }
    }
    return TRUE;
  }

  /**
   * Validate last name.
   *
   * @param string $str
   *   The string.
   *
   * @return bool
   *   The result.
   */
  public function validLastName($str) {
    if (strlen($str) < 3) {
      return FALSE;
    }
    else {
      if (strlen($str) > 15) {
        return FALSE;
      }
      else {
        if (strpos($str, "@")) {
          return FALSE;
        }
        else {
          if (str_contains($str, ' ')) {
            return FALSE;
          }
        }
      }
    }
    return TRUE;
  }

}
