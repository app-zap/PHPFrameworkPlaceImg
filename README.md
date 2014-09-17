# PlaceImg - Libary for image placeholders

This package is intended to be used with the [PHPFramework](https://github.com/app-zap/PHPFramework).

## What it does

It provides a function that returns HTML placeholder image tags and is built to be used as [twig](http://twig.sensiolabs.org/) function.

## How to use

Place following code into the `initialize()` method of handler class:

    $this->response->add_output_function('placeimg', function($width, $height, $attributes = '') {
      return \AppZap\PHPFrameworkPlaceImg\PlaceImg::placeImg($width, $height, $attributes);
    });

After that you can use `{{ placeimg(300, 200) }}` in your twig templates and will get a ready-to-use img tag (e.g. `<img src="http://lorempixel.com/300/200" />`) with a dummy image.

Optionally you can provide additional attributes as a third parameter:  `{{ placeimg(300, 200, 'class="mainimage"')}}`.

***Example:***

<img src="http://lorempixel.com/300/200" />

## Configuration

Via `settings.ini` you can choose between different image placeholder providers.

    [application]
    placeimg_provider = "placebear"

The following providers are supported at the moment:

*  `baconmockup` - [baconmockup.com](http://baconmockup.com/)
*  `dummyimage` - [dummyimage.com](http://dummyimage.com/)
*  `fillmurray` - [fillmurray.com](http://fillmurray.com/)
*  `lorempixel` - [lorempixel.com](http://lorempixel.com/) **(default)**
*  `nicenicejpg` - [nicenicejpg.com](http://nicenicejpg.com/)
*  `placebear` - [placebear.com](http://placebear.com/)
*  `placecage` - [placecage.com](http://placecage.com/)
*  `placehold` - [placehold.it](http://placehold.it/)
*  `placekitten` - [placekitten.com](http://placekitten.com/)

## Dislaimer

Please notice that I don't run these providers and there's no guarantee that they will be available for ever.

If you notice that one of these providers is offline very frequently -or even for ever- please open an [issue](https://github.com/app-zap/PHPFrameworkPlaceImg/issues).

If you know a provider that's missing please open an [issue](https://github.com/app-zap/PHPFrameworkPlaceImg/issues).