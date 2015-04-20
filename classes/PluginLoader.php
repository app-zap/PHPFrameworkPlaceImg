<?php
namespace AppZap\PHPFrameworkPlaceImg;

use AppZap\PHPFramework\Mvc\AbstractController;
use AppZap\PHPFramework\Mvc\View\TwigView;
use AppZap\PHPFramework\SignalSlot\Dispatcher;

class PluginLoader {

  public function __construct() {
    Dispatcher::registerSlot(
        AbstractController::SIGNAL_INIT_RESPONSE,
        [__CLASS__, 'registerPlaceimgFunction']
    );
    Dispatcher::registerSlot(
        AbstractController::SIGNAL_INIT_RESPONSE,
        [__CLASS__, 'registerPlaceimgUrlFunction']
    );
  }

  public function registerPlaceimgFunction(TwigView $response) {
    $response->addOutputFunction('placeimg', function($width, $height, $attributes = '') {
      return PlaceImg::placeImg($width, $height, $attributes, round($width / 2) . ' * ' . round($height / 2));
    });
  }

  public function registerPlaceimgUrlFunction(TwigView $response) {
    $response->addOutputFunction('placeimg_url', function($width, $height) {
      return PlaceImg::placeImgUrl($width, $height, round($width / 2) . ' * ' . round($height / 2));
    });
  }

}
