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
  public static function placeImg($width, $height, $attributes = '', $text = '') {
    $placeimg_provider = Configuration::get('application', 'placeimg_provider', 'lorempixel');

    // max size
    if ($placeimg_provider === 'lorempixel' && ($width > 1920 || $height > 1920)) {
      $placeimg_provider = 'dummyimage';
    }

    $format = '';
    if ($placeimg_provider === 'dummyimage') {
      $format = 'http://dummyimage.com/%sx%s.png&text=' . $text;
    } elseif ($placeimg_provider === 'placehold') {
      $format = 'http://placehold.it/%sx%s';
    } elseif ($placeimg_provider === 'placepuppy') {
      $format = 'http://placepuppy.it/%s/%s';
    } elseif (in_array($placeimg_provider, [
        'placekitten', 'lorempixel', 'nicenicejpg',
        'placecage', 'fillmurray', 'placebear', 'baconmockup',
    ])) {
      $format = 'http://' . $placeimg_provider . '.com/%s/%s';
    }
    return '<img src="' . sprintf($format, $width, $height) . '" ' . $attributes . '/>';
  }

}