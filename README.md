## BitverseIdenticonBundle

This package contains a bundle which integrates [bitverseio/identicon](https://github.com/bitverseio/identicon) with a Symfony application.

### Installation

Download the bundle using composer:

```
$ composer require bitverse/identicon-bundle
```

Enable the bundle in ```app/AppKernel.php```:

```
<?php

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new Bitverse\IdenticonBundle\BitverseIdenticonBundle(),
        );

        // ...
    }

    // ...
}
```

### Configuration

BitverseIdenticonBundle allows you to specify the preprocessor and generator class, as well as the background color for the identicons. Here's the default configuration in YAML:

```yaml
bitverse_identicon:
    preprocessor:
        class: Bitverse\Identicon\Preprocessor\MD5Preprocessor
    generator:
        class: Bitverse\Identicon\Generator\PixelsGenerator
        background_color: #EEEEEE
```

### Usage

The bundle provides the ```identicon``` service which is an instance of ```Bitverse\Identicon\Identicon```. You can use it to create icons directly:

```php
$svg = $this->get('identicon')->getIcon('helloworld');
```

Or you can inject it as a dependency should you need it:

```yaml
services:
    my_service:
        arguments:
            - @identicon
```
