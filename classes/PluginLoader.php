<?php
namespace AppZap\PHPFrameworkPlaceImg;

use AppZap\PHPFramework\Mvc\View\TwigView;

class PluginLoader {

  public function __construct() {
    \AppZap\PHPFramework\SignalSlot\Dispatcher::registerSlot(
        '\AppZap\PHPFramework\Mvc\AbstractController\initializeResponse',
        function(TwigView $response) {
          $response->add_output_function('placeimg', function($width, $height, $attributes = '') {
            return \AppZap\PHPFrameworkPlaceImg\PlaceImg::placeImg($width, $height, $attributes, round($width / 2) . ' * ' . round($height / 2));
          });
          $response->add_output_function('placeimg_url', function($width, $height) {
            return \AppZap\PHPFrameworkPlaceImg\PlaceImg::placeImgUrl($width, $height, round($width / 2) . ' * ' . round($height / 2));
          });
        }
    );
  }

}