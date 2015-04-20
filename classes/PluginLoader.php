<?php
namespace AppZap\PHPFrameworkPlaceImg;

use AppZap\PHPFramework\Mvc\AbstractController;
use AppZap\PHPFramework\Mvc\Router;
use AppZap\PHPFramework\Mvc\View\TwigView;
use AppZap\PHPFramework\SignalSlot\Dispatcher;
use AppZap\PHPFrameworkPlaceImg\Controller\TestpageController;

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
    Dispatcher::registerSlot(
      Router::SIGNAL_ROUTE_DEFINITIONS,
      [__CLASS__, 'registerTestpageRoute']
    );
  }

  public static function registerPlaceimgFunction(TwigView $response) {
    $response->addOutputFunction('placeimg', function ($width, $height, $attributes = '', $provider = '') {
      return PlaceImg::placeImg($width, $height, $attributes, round($width / 2) . ' * ' . round($height / 2), $provider);
    });
  }

  public static function registerPlaceimgUrlFunction(TwigView $response) {
    $response->addOutputFunction('placeimg_url', function ($width, $height, $provider = '') {
      return PlaceImg::placeImgUrl($width, $height, round($width / 2) . ' * ' . round($height / 2), $provider);
    });
  }

  /**
   * @param array $routes
   */
  public static function registerTestpageRoute(&$routes) {
    $routes['placeimg-testpage'] = TestpageController::class;
  }

}

new PluginLoader();
