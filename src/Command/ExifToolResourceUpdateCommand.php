<?php

namespace FileEye\MediaProbe\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;

/**
 * A Symfony application command to update the MediaProbe specification with ExifTool metadata.
 */
class ExifToolResourceUpdateCommand extends Command
{

    protected $specDir;
    protected $exiftoolXml;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('exiftool-update')
            ->setDescription('Update the MediaProbe specification with ExifTool metadata.')
            ->addArgument(
                'spec-dir',
                InputArgument::OPTIONAL,
                'Path to the directory of the .yaml specification files'
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filesystem = new Filesystem();

        $this->specDir = $input->getArgument('spec-dir');
        $this->exiftoolXml = simplexml_load_file($this->specDir . DIRECTORY_SEPARATOR . 'exiftool.xml');
        $output->writeln('Loaded ExifTool XML...');

/*        $updates = [
          'Ifd\\Any' => "//table[@name='Exif::Main']/tag",
          'Ifd\\Ifd0' => "//table[@name='Exif::Main']/tag[not(@g1)]",
          'Ifd\\Ifd1' => "//table[@name='Exif::Main']/tag[not(@g1) or @g1='IFD1']",
          'Ifd\\Interoperability' => "//table[@name='Exif::Main']/tag[@g1='InteropIFD']",
          'Ifd\\Exif' => "//table[@name='Exif::Main']/tag[@g1='ExifIFD']",
          'Ifd\\Gps' => "//table[@name='GPS::Main']/tag",
        ];

        foreach ($updates as $collection => $exiftoolXPath) {
            [$dir, $file] = explode('\\', $collection);
            $collection = $dir . DIRECTORY_SEPARATOR . $file;
            $this->updateWithExifTool($input, $output, $collection . '.yaml', $exiftoolXPath);
            $output->writeln("Processed $collection.");
        }

        // Build Canon maker notes specs.
/*        foreach ($this->exiftoolXml->xpath("//table[@g0='MakerNotes' and @g1='Canon']") as $table) {
            $name = (string) $table->attributes()->name;
            [$a, $b] = explode('::', $name);
            $collection = 'MakerNotes' . DIRECTORY_SEPARATOR . $a . DIRECTORY_SEPARATOR . $b;
            $x_path = "//table[@name='" . $name . "']/tag";
            $this->updateWithExifTool($input, $output, $collection . '.yaml', $x_path);
            $output->writeln("Processed $collection.");
        }
*/
        // Build Canon maker notes specs.
        foreach ($this->exiftoolXml->xpath("//table[@g0='MakerNotes' and @g1='CanonCustom']") as $table) {
            $name = (string) $table->attributes()->name;
            [$a, $b] = explode('::', $name);
            $directory = 'MakerNotes' . DIRECTORY_SEPARATOR . $a;
            $filesystem->mkdir($this->specDir . DIRECTORY_SEPARATOR . $directory);
            $collection = $directory . DIRECTORY_SEPARATOR . $b;
            $c = "MakerNotes\\$a\\$b";
            $x_path = "//table[@name='" . $name . "']/tag";
            $this->updateWithExifTool($input, $output, $collection . '.yaml', $x_path, $c, $table);
            $output->writeln("Processed $collection.");
        }

        // Build Canon maker notes specs.
        foreach ($this->exiftoolXml->xpath("//table[@g0='MakerNotes' and @g1='CanonRaw']") as $table) {
            $name = (string) $table->attributes()->name;
            [$a, $b] = explode('::', $name);
            $directory = 'MakerNotes' . DIRECTORY_SEPARATOR . $a;
            $filesystem->mkdir($this->specDir . DIRECTORY_SEPARATOR . $directory);
            $collection = $directory . DIRECTORY_SEPARATOR . $b;
            $c = "MakerNotes\\$a\\$b";
            $x_path = "//table[@name='" . $name . "']/tag";
            $this->updateWithExifTool($input, $output, $collection . '.yaml', $x_path, $c, $table);
            $output->writeln("Processed $collection.");
        }

        // Build Canon maker notes specs.
        foreach ($this->exiftoolXml->xpath("//table[@g0='CanonVRD' and @g1='CanonVRD']") as $table) {
            $name = (string) $table->attributes()->name;
            [$a, $b] = explode('::', $name);
            $directory = 'MakerNotes' . DIRECTORY_SEPARATOR . $a;
            $filesystem->mkdir($this->specDir . DIRECTORY_SEPARATOR . $directory);
            $collection = $directory . DIRECTORY_SEPARATOR . $b;
            $c = "MakerNotes\\$a\\$b";
            $x_path = "//table[@name='" . $name . "']/tag";
            $this->updateWithExifTool($input, $output, $collection . '.yaml', $x_path, $c, $table);
            $output->writeln("Processed $collection.");
        }

        // Build Apple maker notes specs.
/*        foreach ($this->exiftoolXml->xpath("//table[@g0='MakerNotes' and @g1='Apple']") as $table) {
            $name = (string) $table->attributes()->name;
            [$a, $b] = explode('::', $name);
            $collection = 'MakerNotes' . DIRECTORY_SEPARATOR . $a . DIRECTORY_SEPARATOR . "MakerNotes$a$b";
            $x_path = "//table[@name='" . $name . "']/tag";
            $this->updateWithExifTool($input, $output, $collection . '.yaml', $x_path);
            $output->writeln("Processed $collection.");
        }
*/
        return(0);
    }

    protected function updateWithExifTool(InputInterface $input, OutputInterface $output, $collection_file, $g1, $collection, $table)
    {
        $exiftool_ifd = $this->exiftoolXml->xpath($g1);

        $file_path = $this->specDir . DIRECTORY_SEPARATOR . $collection_file;

        if (file_exists($file_path)) {
            $ifd = Yaml::parse(file_get_contents($file_path));
        }
        else {
            $desc = $table->xpath("desc[@lang='en']");
            $ifd = [
                'collection' => $collection,
                'name' => str_replace('::', '', $table->attributes()->name),
                'title' => (string) $desc[0],
                'class' => 'tbd',
                'DOMNode' => 'tbd',
                'format' => 'tbd',
                'defaultItemCollection' => 'Tag',
                'compiler' => [
                    'exiftool' => [
                        'xpath' => $g1,
                    ],
                ],
            ];
        }

        foreach ($exiftool_ifd as $exiftool_tag) {
              $id = (string) $exiftool_tag->attributes()->id;
              $index = (string) ($exiftool_tag->attributes()->index ?? 0);
              unset($ifd['items'][$id]['exiftool'][$index]);

              if (($ifd['items'][$id]['collection'] ?? null) === ($ifd['defaultItemCollection'] ?? null)) {
                  unset($ifd['items'][$id]['collection']);
              }

              foreach ($exiftool_tag->attributes() as $key => $val) {
                  if (in_array($key, ['id', 'index'])) {
                      continue;
                  }
                  if ($key === 'writable') {
                      $val = ((string) $val) === 'true' ? true : false;
                  }
                  elseif ($key === 'count') {
                      $val = (int) $val;
                  }
                  else {
                      $val = (string) $val;
                  }
                  $ifd['items'][$id]['exiftool'][$index][$key] = $val;
              }
              $desc = $exiftool_tag->xpath("desc[@lang='en']");
              $ifd['items'][$id]['exiftool'][$index]['desc'] = (string) $desc[0];
              if ($exiftool_tag->values) {
                  foreach ($exiftool_tag->values->key as $key) {
                      $key_id = (string) $key->attributes()->id;
                      $key_val = $key->xpath("val[@lang='en']");
                      $ifd['items'][$id]['exiftool'][$index]['values'][$key_id] = (string) $key_val[0];
                  }
              }
        }
        ksort($ifd['items']);

        file_put_contents($file_path, Yaml::dump($ifd, 7));
    }
}
