# WORK IN PROGRESS - this code is not ready for usage

# MediaProbe

[![Tests](https://github.com/FileEye/MediaProbe/actions/workflows/tests.yml/badge.svg)](https://github.com/FileEye/MediaProbe/actions/workflows/tests.yml)

A PHP library for reading and writing Exif headers in JPEG and TIFF images.

MediaProbe is a fork of the [PHP Exif library](https://github.com/pel/pel). See all
the [contributors](https://github.com/FileEye/MediaProbe/graphs/contributors).


## Description

MediaProbe makes it easy to develop programs that will read and write the Exif
metadata headers found in JPEG and TIFF images.  See the file INSTALL.md for an
introduction to how MediaProbe can be used by your application.

Please note that the API for MediaProbe is not yet frozen, and it will remain
changeable until version a stable version 1.0.0 is reached.


## Installation

```
composer require fileeye/mediaprobe
```


## Documentation Overview

* README.md: gives you a short introduction to MediaProbe (this file).
* INSTALL.md: explain how to install and get going with MediaProbe.
* [SPECIFICATION.md](SPECIFICATION.md): specifications for the YAML files
  describing the EXIF tags supported by the library. Must read for developers
  willing to contribute additional EXIF support.
* examples/: small self-contained examples of how to use MediaProbe.
* AUTHORS.md: list of people who have helped.


## Features of MediaProbe

* Reads and writes Exif metadata from both JPEG and TIFF images.
* Supports reading and writing all Exif tags.
* Extensible object-oriented design.
* PhpUnit tested


## Helping out

Help will be very much appreciated. You can report issues, run the test
suite, add patches. The best way to help out is applying patches and
helping out with the tests. See instructions in the test/ directory.

All changes to code should be issued through a pull request, and other
maintainers should review the code and merge it.


## Getting Support

The first place you should consult for support is the documentation
supplied with MediaProbe, found in the doc/ directory.  There you will find a
complete API documentation with descriptions of all classes and files
in MediaProbe.

The scripts found in the examples/ directory are also a good source of
information, especially the edit-description.php file which has tons
of comments.

MediaProbe is hosted on Github and uses the tools found there for
support.  This means that all questions, bug reports, etc. should be
directed there (and not directly to the developers).

Please try the latest version before reporting bugs -- it might have
been fixed already.  The latest code can be found in the git
repository at

  https://github.com/FileEye/MediaProbe

It is very helpful if you try out the latest code from the git
repository before submitting a bug report. The code found there is
generally very stable.


## Contributing Test Images

To make MediaProbe as stable as possible, it is tested with images from a
number of different camera models.

New test images are very much appreciated -- please download the
existing test images and read the README file found there for
instructions.


## Credits

Please see the AUTHORS file for a list of people who have contributed
to MediaProbe.
