<?php

namespace Drupal\lemberg_custom\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * It then returns a JSON response with student names and marks.
 */
class WebUIController extends ControllerBase {

  /**
   * Returns a render-able array for a test page.
   */
  public function home(Request $request) {
    $type = $request->get('type', 'pass');
    // Filter the student based on the pass or fail.
    $students_storage = $this->entityTypeManager()->getStorage('node');
    $query = $students_storage->getQuery()
      ->accessCheck(FALSE)
      ->condition('type', 'students');
    $type == 'pass' ? $query->condition('field_marks', 50, '>=') : $query->condition('field_marks', 50, '<');
    $ids = $query->execute();
    $students = $students_storage->loadMultiple($ids);
    $data = [];
    foreach ($students as $student) {
      $data[] = [
        'name' => $student->getTitle(),
        'marks' => (int) $student->get('field_marks')->getString(),
      ];
    }
    return new JsonResponse(['students' => array_values($data)]);
  }

}
