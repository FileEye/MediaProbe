<?php

namespace FileEye\MediaProbe\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

/**
 * A Symfony application command to update the MediaProbe specification with ExifTool metadata.
 */
class ExifToolResourceUpdateCommand extends Command
{

    protected $specDir;
    protected $exiftoolXml;
    protected $phpExifTags;

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
//        $this->exiftoolXml = simplexml_load_file($this->specDir . DIRECTORY_SEPARATOR . 'exiftool.xml');
        $this->exiftoolXml = simplexml_load_file('specs/exiftool.xml');
        $output->writeln('Loaded ExifTool XML...');

        $this->phpExifTags = Yaml::parse(file_get_contents('specs/exiftags.yaml'));

        $finder = new Finder();
        $finder->files()->in($this->specDir)->name('*.yaml');
        foreach ($finder as $file) {
            $this->updateWithExifTool($input, $output, $file);
            $output->writeln("Processed $file.");
        }
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
/*        foreach ($this->exiftoolXml->xpath("//table[@g0='MakerNotes' and @g1='CanonCustom']") as $table) {
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

    protected function updateWithExifTool(InputInterface $input, OutputInterface $output, $collection_file)
    {
        $spec = Yaml::parse(file_get_contents($collection_file));
        $exiftool_ifd = $this->exiftoolXml->xpath($spec['compiler']['exiftool']['xpath']);

        foreach ($exiftool_ifd as $exiftool_tag) {
            $id = (string) $exiftool_tag->attributes()->id;
            $index = (string) ($exiftool_tag->attributes()->index ?? 0);

            // Reset exiftool metadata.
            unset($spec['items'][$id]['exifReadData']);
            if (isset($this->phpExifTags['items'][$id])) {
                $spec['items'][$id]['exifReadData']['key'] = $this->phpExifTags['items'][$id];
            }

            // Reset exiftool metadata.
            unset($spec['items'][$id]['exiftool'][$index]);

            // Sanity - remove actual collection if it's the same as the default one.
            if (($spec['items'][$id]['collection'] ?? null) === ($spec['defaultItemCollection'] ?? null)) {
                unset($spec['items'][$id]['collection']);
            }

            // Scan through the attributes.
            foreach ($exiftool_tag->attributes() as $key => $val) {
                if (in_array($key, ['id', 'index'])) {
                    continue;
                }
                if ($key === 'writable') {
                    $val = ((string) $val) === 'true' ? true : false;
                } elseif ($key === 'count') {
                    $val = (int) $val;
                } else {
                    $val = (string) $val;
                }
                $spec['items'][$id]['exiftool'][$index][$key] = $val;
            }

            // Set exiftool item DOM node name.
            if ($spec['compiler']['exiftool']['g1Default'] === '') {
                if ($exiftool_tag->attributes()->g1) {
                    $prefix = (string) $exiftool_tag->attributes()->g1;
                } else {
                    $prefix = 'IFD0';
                }
            } else {
                $prefix = $spec['compiler']['exiftool']['g1Default'];
            }
            $spec['items'][$id]['exiftool'][$index]['DOMNode'] = $prefix . ':' . (string) $exiftool_tag->attributes()->name;

            // Add the English description of the item.
            $desc = $exiftool_tag->xpath("desc[@lang='en']");
            $spec['items'][$id]['exiftool'][$index]['desc'] = (string) $desc[0];

            // Add the decodable values, with their English description.
            if ($exiftool_tag->values) {
                foreach ($exiftool_tag->values->key as $key) {
                    $key_id = (string) $key->attributes()->id;
                    $key_val = $key->xpath("val[@lang='en']");
                    $spec['items'][$id]['exiftool'][$index]['values'][$key_id] = (string) $key_val[0];
                }
            }
        }
        ksort($spec['items']);

        file_put_contents($collection_file, Yaml::dump($spec, 7));
    }
}
