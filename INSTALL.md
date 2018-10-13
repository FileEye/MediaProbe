# INSTALL


## Requirements

ExifEye requires PHP version 5.4 or above.


## Installation

### Composer

The preferred way of installing ExifEye is through composer. Simply add a
dependency on ´exifeye/exifeye´ to your projects composer.json.

    {
        "require": {
            "exifeye/exifeye": "^1"
        }
    }

For a system-wide installation via Composer, you can run:

    composer global require "exifeye/exifeye=^1"


### Clone via git

You can also use git to install it using:

  git clone git://github.com/ExifEye/ExifEye.git
  git checkout <tag name>

Finally, you can install ExifEye by extracting it to a local directory. You can
find the compressed files here: https://github.com/ExifEye/ExifEye/releases.

@todo xx autoload classes
Make sure that you extract the files to a path included in your include path:
You can set the include path using.

    set_include_path('/path/to/ExifEye' . PATH_SEPARATOR . get_include_path());


## Upgrading

If you have already been using a previous version of ExifEye, then be sure to
read the CHANGELOG.md file before starting with a new version.


## Using ExifEye

@todo xx autoload classes
Your application should include Jpeg.php or Tiff.php for working
with JPEG or TIFF files.  The files will define the Jpeg and
Tiff classes, which can hold a JPEG or TIFF image, respectively.
Please see the API documentation in the doc directory or online at

  @todo

for the full story about those classes and all other available classes in
ExifEye.

Still, an example would be good.  The following example will load a JPEG file
given as a command line argument, parse the Exif data within, change the image
description to 'Edited by ExifEye', and finally save the file again.
All in just four lines of code:

  ```php5
  <?php
  use ExifEye\core\Image;

  $image = Image::createFromFile($argv[1]);
  $entry = $image->getElement("tag[@name='ImageDescription']/entry");
  $entry->setValue(['Edited by ExifEye']);
  $image->saveToFile($argv[1]);
  ?>
  ```

## Changing ExifEye

Report issues here:

  https://github.com/ExifEye/ExifEye/issues

You can change the code (to fix bugs or to implement enhancements) and submit
pull requests at

  https://github.com/ExifEye/ExifEye/pulls

It is highly recommended that you test your changes against known good data.
Please see the test/README.md file for more information about running the
ExifEye test suite.
