<?php
namespace AppZap\PHPFrameworkPlaceImg;

use AppZap\PHPFramework\Configuration\Configuration;

class PlaceImg {

  /**
   * @param int $width
   * @param int $height
   * @param string $attributes
   * @return string
   */
  public static function placeImg($width, $height, $attributes = '') {
    $placeimg_provider = Configuration::get('application', 'placeimg_provider', 'lorempixel');
    $format = '';
    if ($placeimg_provider === 'placehold') {
      $format = 'http://placehold.it/%sx%s';
    } elseif (in_array($placeimg_provider, [
        'placekitten', 'lorempixel', 'dummyimage', 'nicenicejpg',
        'placecage', 'fillmurray', 'placebear', 'baconmockup',
    ])) {
      $format = 'http://' . $placeimg_provider . '.com/%s/%s';
    }
    return '<img src="' . sprintf($format, $width, $height) . '" ' . $attributes . '/>';
  }

}