<?php

namespace Drupal\Tests\lemberg_custom\Functional;

use weitzman\DrupalTestTraits\ExistingSiteBase;

/**
 * Test something about my WebUI.
 *
 * @group webui
 */
class WebUIControllerFunctionalTest extends ExistingSiteBase {

  /**
   * Test something.
   */
  public function testSomething() {
    $this->assertEquals(TRUE, TRUE);
  }

  /**
   * Test home.
   */
  public function testHome() {
    // Checking pass assertion.
    $type = 'pass';
    $response = $this->drupalGet('/web-ui/students/' . $type);
    $data = json_decode($response, TRUE);
    foreach ($data['students'] as $student) {
      // Assert checking for fail students.
      $this->assertGreaterThanOrEqual(50, $student['marks']);
    }

    // Checking failed assertion.
    $type = 'failed';
    $response = $this->drupalGet('/web-ui/students/' . $type);
    $data = json_decode($response, TRUE);
    foreach ($data['students'] as $student) {
      // Assert checking for fail students.
      $this->assertLessThan(50, $student['marks']);
    }
  }

}
