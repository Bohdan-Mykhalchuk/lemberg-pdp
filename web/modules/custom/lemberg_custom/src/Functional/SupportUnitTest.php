<?php

namespace Drupal\lemberg_custom\Functional;

use Drupal\lemberg_custom\Support;
use Drupal\Tests\UnitTestCase;

/**
 * Support unit test.
 *
 * @group lemberg_custom
 */
class SupportUnitTest extends UnitTestCase {

  /**
   * Support object.
   *
   * @var \Drupal\lemberg_custom\Support
   */
  private Support $support;

  /**
   * {@inheritdoc}
   */
  protected function setUp() : void {
    parent::setUp();
    $this->support = new Support();
  }

  /**
   * Test first name.
   */
  public function testFirstName() {
    // Assertion 1.
    $valid = $this->support->validFirstName("John");
    $this->assertEquals($valid, TRUE);
    // Assertion 2.
    $valid = $this->support->validFirstName("John@Doe");
    $this->assertEquals($valid, FALSE);
    // Assertion 3.
    $valid = $this->support->validFirstName("Nico Wright");
    $this->assertEquals($valid, FALSE);
    // Assertion 4.
    $valid = $this->support->validFirstName("Amy");
    $this->assertEquals($valid, TRUE);
    // Assertion 5.
    $valid = $this->support->validFirstName("XY");
    $this->assertEquals($valid, FALSE);
  }

  /**
   * Test last name.
   */
  public function lastNameProvider() {
    return [
      [
        "expected" => "Doe",
        "output" => TRUE,
      ],
      [
        "expected" => "Wright Amy",
        "output" => FALSE,
      ],
      [
        "expected" => "Wright@",
        "output" => FALSE,
      ],
      [
        "expected" => "Williams",
        "output" => TRUE,
      ],
    ];
  }

  /**
   * Perform testFirstName.
   *
   * @dataProvider lastNameProvider
   */
  public function testLastName($expected, $output) {
    $valid = $this->support->validFirstName($expected);
    $this->assertEquals($valid, $output);
  }

}
