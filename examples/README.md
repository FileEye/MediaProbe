# README file for ImageProbe Examples

## ImageProbe Examples

This directory contains various examples of how ImageProbe can be used in
small scripts.  The scripts are meant to be executed from the command
line and they assume that you have PHP installed as /usr/bin/php.  If
that is not the case, then please adjust the first line before
executing the scripts, or simply execute them as

```
% php <script> <arguments>
```

and let your shell find the PHP executable.

The examples are:

* dump-image.php: a simple script that will load an image and show the
  structure.

  A JPEG or TIFF image should be specified on the command line.  The
  dump will give detailed information about the structure in the
  image.

## Contributing New Examples

More examples are needed!  If you have a neat example of how ImageProbe can
be used, then please contribute it to ImageProbe.  Please submit it as a new
item in the Github issue tracker:

  http://github.com/fileeye/imageprobe/issues

Or issue a pull request. It will then be included in the next release
of ImageProbe, of course with full credit in the AUTHORS file.
