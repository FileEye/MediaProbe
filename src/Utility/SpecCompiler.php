<?php

namespace FileEye\MediaProbe\Utility;

use FileEye\MediaProbe\Collection;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Yaml\Yaml;

/**
 * Compiles a set of MediaProbe specification YAML files.
 */
class SpecCompiler
{
    /**
     * Default directory where to read the specification files from.
     */
    const DEFAULT_SPEC_PATH = '/../../specs';

    /**
     * Default directory where to write compiled classes.
     */
    const DEFAULT_COLLECTION_PATH = '/../Collection';

    /**
     * Default directory where to write compiled classes.
     */
    const DEFAULT_COLLECTION_NAMESPACE = 'FileEye\\MediaProbe\\Collection';

    /**
     * Identifier for void collection.
     */
    const VOID_COLLECTION = 'VoidCollection';

    /**
     * Map of expected collection level array keys.
     */
    //private $collectionKeys = ['name', 'title', 'items'];
    private $collectionKeys = ['collection', 'items'];

    /** @var Filesystem */
    private $fs;

    /** @var Finder */
    private $finder;

    /**
     * The compiled MediaProbe specification map.
     *
     * @var array
     */
    private $map = [];

    /**
     * MediaProbe supported primitive data formats.
     *
     * @var array
     */
    private $formats = [];

    /**
     * Exiftool supported primitive data formats.
     *
     * @var array
     */
    private $exiftoolFormats = [];

    /**
     * Constructs a SpecCompiler object.
     *
     * @param Finder $finder
     * @param Filesystem $fs
     */
    public function __construct(Finder $finder = null, Filesystem $fs = null)
    {
        $this->finder = $finder ? $finder : new Finder();
        $this->fs = $fs ? $fs : new Filesystem();
    }

    /**
     * Compiles a set of MediaProbe specification YAML files.
     *
     * @param string $yamlDirectory
     *            the directory containing a set of .yaml specification files.
     * @param string $resourcesDirectory
     *            the directory where the compiled PHP specification file will
     *            be stored.
     */
    public function compile($yamlDirectory = null, $resourcesDirectory = null, $namespace = null, $collection_path = null, $collection_namespace = null)
    {
        $yamlDirectory = $yamlDirectory ?: __DIR__ . static::DEFAULT_SPEC_PATH;
        $resourcesDirectory = $resourcesDirectory ?: __DIR__ . static::DEFAULT_COLLECTION_PATH;
        $namespace = $namespace ?: static::DEFAULT_COLLECTION_NAMESPACE;

        $collection_path = $collection_path ?: __DIR__ . static::DEFAULT_COLLECTION_PATH;
        $collection_namespace = $collection_namespace ?: static::DEFAULT_COLLECTION_NAMESPACE;
        $this->fs->remove($this->finder->files()->in($collection_path));

        // Get formats.
        $formats_yaml = Yaml::parse(file_get_contents($yamlDirectory . DIRECTORY_SEPARATOR . 'Format.yaml'));
        foreach ($formats_yaml['items'] as $id => $item) {
            $this->formats[$item['name']] = $id;
        }
        $this->exiftoolFormats = Yaml::parse(file_get_contents($yamlDirectory . DIRECTORY_SEPARATOR . 'ExiftoolFormat.yaml'));

        // Process the files. Each file corresponds to a collection.
        $files = $this->finder->files()->in($yamlDirectory)->name('*.yaml');
        foreach ($files as $file) {
            $collection = Yaml::parse($file->getContents());
            if ($collection['compiler']['skip'] ?? false) {
                continue;
            }
            $this->mapCollection($collection, $file, $collection_path, $collection_namespace);
        }

        if (isset($this->map['collections'])) {
            ksort($this->map['collections']);
        }
        if (isset($this->map['collectionsByName'])) {
            ksort($this->map['collectionsByName']);
        }

        // Dump the data to the mapper class file.
        $data = <<<DATA
<?php
namespace $namespace;

/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable
abstract class Core {
  public static \$map =
DATA;
        $data .= ' ';
        $data .= preg_replace('/\s+$/m', '', var_export($this->map, true)) . ';';
        $data .= <<<DATA

}

DATA;
        $this->fs->dumpFile($resourcesDirectory . '/Core.php', $data);
    }

    /**
     * Processes a 'collection' into the compiled map.
     *
     * @param array $input
     *            the array from the specification file.
     * @param SplFileInfo $file
     *            the YAML specification file being processed.
     */
    protected function mapCollection(array $input, SplFileInfo $file, $collection_path, $collection_namespace)
    {
        // Check validity of collection keys.
        $diff = array_diff($this->collectionKeys, array_intersect(array_keys($input), $this->collectionKeys));
        if (!empty($diff)) {
            throw new SpecCompilerException($file->getFileName() . ": missing collection key(s) - " . implode(", ", $diff));
        }

        $name = $input['name'] ?? $input['collection'];

        // Process 'format'
        if (!empty($input['format'])) {
            $input['format'] = $this->format2Id($input['format'], 'base', $name, $file);
        }

        // Main index entries.
        // 'collections' entry.
        $this->map['collections'][$input['collection']] = $input['collection'];
        // 'collectionsByName' entry.
        $this->map['collectionsByName'][(string) $name] = $input['collection'];
        if (!empty($input['alias'])) { // xx todo check for duplicates
            foreach ($input['alias'] as $alias) {
                $this->map['collectionsByName'][(string) $alias] = $input['collection'];
            }
        }

        // Collection-level entries.
        $tmp = $input;
        unset($tmp['collection'], $tmp['items'], $tmp['compiler']);
        $map = $tmp;

        // Collection items entries.
        foreach ($input['items'] as $id => $item) {
            // Item must have a collection.
            $item['collection'] = $item['collection'] ?? $input['defaultItemCollection'] ?? static::VOID_COLLECTION;

            // Fetch the first available Exiftool definition if available.
            $exiftool = isset($item['exiftool']) ? reset($item['exiftool']) : null;

            // Add the name.
            if (!isset($item['name']) && isset($exiftool['name'])) {
                $item['name'] = $exiftool['name'];
            }

            // Add a title if available.
            if (!isset($item['title']) && isset($exiftool['desc'])) {
                $item['title'] = $exiftool['desc'];
            }

            // Add components if available.
            if (!isset($item['components']) && isset($exiftool['count'])) {
                $item['components'] = $exiftool['count'];
            }

            // Convert format string to its ID.
            if (isset($item['format'])) {
                $item['format'] = $this->format2Id($item['format'], 'base',  $item['name'] ?? $item['collection'], $file);
            }
            elseif ($exiftool['type'] ?? false) {
                $item['format'] = $this->format2Id($exiftool['type'], 'exiftool',  $item['name'] ?? $item['collection'], $file);
            }

            // Add text mapping if available.
            if (!isset($item['text']['mapping']) && isset($exiftool['values'])) {
                $item['text']['mapping'] = $exiftool['values'];
            }

            $item_exif_tag = $item['exifReadData']['key'] ?? null;

            unset($item['exifReadData']);
            unset($item['exiftool']);

            // Add item to map by collection/name.
            if (isset($item['name'])) { // xx
                $map['itemsByName'][$item['name']] = $id;
            }

            // Add item to map by exif_read_data key.
            if (isset($item_exif_tag)) { // xx
                $item['phpExifTag'] = $item_exif_tag;
                $map['itemsByPhpExifTag'][$item_exif_tag] = $id;
            }

            // Add item to map by exiftool DOMNode.
            if (isset($exiftool['DOMNode'])) { // xx
                $item['exiftoolDOMNode'] = $exiftool['DOMNode'];
                $map['itemsByExiftoolDOMNode'][$exiftool['DOMNode']] = $id;
            }

            // Add item to map by collection/id.
            $map['items'][$id] = $item;
        }

        if (isset($map['items'])) {
            ksort($map['items']);
        }

        if (isset($map['itemsByName'])) {
            ksort($map['itemsByName']);
        }

        if (isset($map['itemsByPhpExifTag'])) {
            ksort($map['itemsByPhpExifTag']);
        }

        if (isset($map['itemsByExiftoolDOMNode'])) {
            ksort($map['itemsByExiftoolDOMNode']);
        }

        $parts = explode('\\', $input['collection']);
        $class_name = array_pop($parts);
        if ($parts) {
            $namespace = $collection_namespace . '\\' . implode('\\', $parts);
        }
        else {
            $namespace = $collection_namespace;
        }

        // Dump the data to the mapper class file.
        $data = <<<DATA
<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace $namespace;

use FileEye\\MediaProbe\\Collection;

class $class_name extends Collection {

  protected static \$map =
DATA;

        $data .= ' ';
        $data .= preg_replace('/\s+$/m', '', var_export($map, true)) . ';';

        $data .= <<<DATA

}

DATA;

        $this->fs->dumpFile($collection_path . "/" . implode("/", $parts) . "/$class_name.php", $data);
    }

    protected function format2Id($input, string $type, string $item_name, SplFileInfo $file): array
    {
        if ($type === 'base') {
            $temp = [];
            if (is_scalar($input)) {
                $temp[] = $input;
            } else {
                $temp = $input;
            }
            $formats = [];
            foreach ($temp as $name) {
                if (!isset($this->formats[$name])) {
                    throw new SpecCompilerException($file->getFileName() . ": invalid '" . $name . "' format found for item '" . $item_name . "'");
                }
                $formats[] = $this->formats[$name];
            }
            return $formats;
        }
        elseif ($type === 'exiftool') {
            $format_name = $this->exiftoolFormats['items'][$input]['format'] ?? null;
            if ($format_name === null) {
                throw new SpecCompilerException($file->getFileName() . ": invalid '" . $input . "' Exiftool format found for item '" . $item_name . "'");
            }
            if (!isset($this->formats[$format_name])) {
                throw new SpecCompilerException($file->getFileName() . ": invalid '" . $format_name . "' format found for item '" . $item_name . "'");
            }
            return [$this->formats[$format_name]];
        }
    }
}
