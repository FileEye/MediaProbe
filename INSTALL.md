# INSTALL


## Requirements

MediaProbe requires PHP version 5.4 or above.


## Installation

### Composer

The preferred way of installing MediaProbe is through composer. Simply add a
dependency on ´fileeye/mediaprobe´ to your projects composer.json.

    {
        "require": {
            "fileeye/mediaprobe": "^1"
        }
    }

For a system-wide installation via Composer, you can run:

    composer global require "fileeye/mediaprobe=^1"


### Clone via git

You can also use git to install it using:

  git clone git://github.com/FileEye/MediaProbe.git
  git checkout <tag name>

Finally, you can install MediaProbe by extracting it to a local directory. You can
find the compressed files here: https://github.com/FileEye/MediaProbe/releases.

@todo xx autoload classes
Make sure that you extract the files to a path included in your include path:
You can set the include path using.

    set_include_path('/path/to/MediaProbe' . PATH_SEPARATOR . get_include_path());


## Upgrading

If you have already been using a previous version of MediaProbe, then be sure to
read the CHANGELOG.md file before starting with a new version.


## Using MediaProbe

@todo xx autoload classes
Your application should include Jpeg.php or Tiff.php for working
with JPEG or TIFF files.  The files will define the Jpeg and
Tiff classes, which can hold a JPEG or TIFF image, respectively.
Please see the API documentation in the doc directory or online at

  @todo

for the full story about those classes and all other available classes in
MediaProbe.

Still, an example would be good.  The following example will load a JPEG file
given as a command line argument, parse the Exif data within, change the image
description to 'Edited by MediaProbe', and finally save the file again.
All in just four lines of code:

  ```php5
  <?php
  use FileEye\MediaProbe\Image;

  $image = Image::loadFromFile($argv[1]);
  $entry = $image->getElement("tag[@name='ImageDescription']/entry");
  $entry->setDataElement(['Edited by MediaProbe']);
  $image->saveToFile($argv[1]);
  ?>
  ```

## Changing MediaProbe

Report issues here:

  https://github.com/FileEye/MediaProbe/issues

You can change the code (to fix bugs or to implement enhancements) and submit
pull requests at

  https://github.com/FileEye/MediaProbe/pulls

It is highly recommended that you test your changes against known good data.
Please see the test/README.md file for more information about running the
MediaProbe test suite.
