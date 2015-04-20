<?php
namespace AppZap\PHPFrameworkPlaceImg\Controller;

use AppZap\PHPFramework\Mvc\AbstractController;

class TestpageController extends AbstractController {

  public function initialize() {
    $this->response->setTemplatesDirectory(realpath(__DIR__ . '/../../templates/'));
  }

  public function get() {

  }

}
