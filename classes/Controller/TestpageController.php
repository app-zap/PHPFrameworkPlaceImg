<?php
namespace AppZap\PHPFrameworkPlaceImg\Controller;

use AppZap\PHPFramework\Mvc\AbstractController;

class TestpageController extends AbstractController {

  public function initialize() {
    $this->response->setTemplatesDirectory(realpath(__DIR__ . '/../../templates/'));
  }

  public function get() {
    $this->response->set('providers', [
      'baconmockup',
      'dummyimage',
      'fakeimg',
      'fillmurray',
      'lorempixel',
      'nicenicejpg',
      'p-hold',
      'place-hoff',
      'placebear',
      'placebeard',
      'placecage',
      'placehold',
      'placeimg',
      'placesheen',
      'stevensegallery',
      'unsplash',
    ]);
  }

}
