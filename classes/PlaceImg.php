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
    $url = self::placeImgUrl($width, $height, $text);
    return '<img src="' . $url . '" ' . $attributes . '/>';
  }

  /**
   * @param $width
   * @param $height
   * @param string $text
   * @return string
   */
  public static function placeImgUrl($width, $height, $text = '') {
    $placeimg_provider = Configuration::get('application', 'placeimg_provider', 'lorempixel');

    // max size
    if ($placeimg_provider === 'lorempixel' && ($width > 1920 || $height > 1920)) {
      $placeimg_provider = 'dummyimage';
    }

    $format = '';
    if ($placeimg_provider === 'dummyimage') {
      $format = 'http://dummyimage.com/%sx%s.png&text=' . $text;
    } elseif ($placeimg_provider === 'placehold') {
      $format = 'http://placehold.it/%sx%s&text=' . $text;
    } elseif ($placeimg_provider === 'placepuppy') {
      $format = 'http://placepuppy.it/%s/%s';
    } elseif (in_array($placeimg_provider, [
        'placekitten', 'lorempixel', 'nicenicejpg',
        'placecage', 'fillmurray', 'placebear', 'baconmockup',
    ])) {
      $format = 'http://' . $placeimg_provider . '.com/%s/%s';
    }
    $url = sprintf($format, $width, $height);
    return $url;
  }

}