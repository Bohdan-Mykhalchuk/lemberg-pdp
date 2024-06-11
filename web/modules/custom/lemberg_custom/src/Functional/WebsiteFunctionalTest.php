<?php

namespace Drupal\lemberg_custom\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Test something about my WebUI.
 *
 * @group lemberg_custom
 */
class WebsiteFunctionalTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['system'];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    $admin = $this->createUser([], NULL, TRUE);
    $this->drupalLogin($admin);
    $this->assertTrue(TRUE);
  }

  /**
   * Test home.
   */
  public function testAdminPage(): void {
    // Visit a Drupal page that requires admin role.
    $this->drupalGet('admin/modules');
    // Check if user is able to see the page.
    $this->assertSession()->pageTextContains('Extend');
    $this->assertSession()->statusCodeEquals(200);
  }

}
