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
  public static function placeImg($width, $height, $attributes = '', $text = '', $provider = NULL) {
    $url = self::placeImgUrl($width, $height, $text, $provider);
    return '<img src="' . $url . '" ' . $attributes . '/>';
  }

  /**
   * @param int $width
   * @param int $height
   * @param string $text
   * @param string $provider
   * @return string
   */
  public static function placeImgUrl($width, $height, $text = '', $provider = NULL) {
    $placeimg_provider = $provider ?: Configuration::get('application', 'placeimg_provider', 'lorempixel');

    // max size
    if ($placeimg_provider === 'lorempixel' && ($width > 1920 || $height > 1920)) {
      $placeimg_provider = 'dummyimage';
    }

    $format = '';
    if ($placeimg_provider === 'dummyimage') {
      $format = 'http://dummyimage.com/%sx%s.png&text=' . $text;
    } elseif ($placeimg_provider === 'placehold') {
      $format = 'http://placehold.it/%sx%s&text=' . $text;
    } elseif ($placeimg_provider === 'fakeimg') {
      $format = 'http://fakeimg.pl/%sx%s/?text=' . $text;
    } elseif (in_array($placeimg_provider, [
      // .it
      'placebeard', 'unsplash',
    ])) {
      $format = 'http://' . $placeimg_provider . '.it/%s/%s/?%s';
    } elseif (in_array($placeimg_provider, [
      // .com without random number support
      'placebear', 'placecage',
      'placeimg', 'placesheen',
    ])) {
      $format = 'http://' . $placeimg_provider . '.com/%s/%s';
    } elseif (in_array($placeimg_provider, [
      // .com with random number support
      'baconmockup', 'fillmurray',
      'lorempixel', 'nicenicejpg',
      'p-hold', 'place-hoff',
      'stevensegallery',
    ])) {
      $format = 'http://' . $placeimg_provider . '.com/%s/%s/?%s';
    }
    $url = sprintf($format, $width, $height, rand(0,9999));
    return $url;
  }

}
