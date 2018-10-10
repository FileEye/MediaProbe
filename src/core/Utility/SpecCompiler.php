<?php

namespace ExifEye\core\Utility;

use ExifEye\core\Block\Ifd;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Yaml\Yaml;

/**
 * Compiles a set of ExifEye specification YAML files.
 */
class SpecCompiler
{
    /**
     * Map of expected element level array keys.
     */
    private $elementKeys = ['type', 'name', 'title', 'class', 'elements'];

    /** @var Filesystem */
    private $fs;

    /** @var Finder */
    private $finder;

    /**
     * The compiled ExifEye specification map.
     *
     * @var array
     */
    private $map = [];

    /**
     * ExifEye supported primitive data formats.
     *
     * @var array
     */
    private $formats = [];

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
     * Compiles a set of ExifEye specification YAML files.
     *
     * @param string $yamlDirectory
     *            the directory containing a set of .yaml specification files.
     * @param string $resourcesDirectory
     *            the directory where the compiled PHP specification file will
     *            be stored.
     */
    public function compile($yamlDirectory, $resourcesDirectory)
    {
        // Get formats.
        $formats_yaml = Yaml::parse(file_get_contents($yamlDirectory . DIRECTORY_SEPARATOR . 'format.yaml'));
        foreach ($formats_yaml['elements'] as $id => $element) {
            $this->formats[$element['name']] = $id;
        }

        // Process the files. Each file corresponds to an IFD specification.
        $files = $this->finder->files()->in($yamlDirectory)->name('*.yaml');
        foreach ($files as $file) {
            $ifd = Yaml::parse($file->getContents());
            $this->mapType($ifd, $file);
        }

        // Dump the data to the spec.php file.
        $data = <<<DATA
<?php
/**
 * This file is generated automatically by executing the 'exifeye compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
return
DATA;
        $data .= ' ';
        $data .= preg_replace('/\s+$/m', '', var_export($this->map, true)) . ';';
        $this->fs->dumpFile($resourcesDirectory . '/spec.php', $data);
    }

    /**
     * Processes a 'type' into the compiled map.
     *
     * @param array $input
     *            the array from the specification file.
     * @param SplFileInfo $file
     *            the YAML specification file being processed.
     */
    protected function mapType(array $input, SplFileInfo $file)
    {
        // Check validity of element keys.
        $diff = array_diff($this->elementKeys, array_intersect(array_keys($input), $this->elementKeys));
        if (!empty($diff)) {
            throw new SpecCompilerException($file->getFileName() . ": missing type key(s) - " . implode(", ", $diff));
        }

        // 'types' entry.
        $tmp = $input;
        unset($tmp['type'], $tmp['elements']);
        $this->map['types'][$input['type']] = $tmp;

        // 'typesByName' entry.
        $this->map['typesByName'][$input['name']] = $input['type'];
        if (!empty($input['alias'])) {
            foreach ($input['alias'] as $alias) {
                $this->map['typesByName'][$alias] = $input['type'];
            }
        }

        // 'makerNotes' entry.
        if (!empty($input['makerNotes'])) {
            foreach ($input['makerNotes'] as $maker) {
                $this->map['makerNotes'][$maker] = $input['type'];
            }
        }

        // 'elements' entry.
        foreach ($input['elements'] as $id => $element) {
            // Convert format string to its ID.
            if (isset($element['format'])) {
                $temp = [];
                if (is_scalar($element['format'])) {
                    $temp[] = $element['format'];
                } else {
                    $temp = $element['format'];
                }
                $formats = [];
                foreach ($temp as $name) {
                    if (!isset($this->formats[$name])) {
                        throw new SpecCompilerException($file->getFileName() . ": invalid '" . $name . "' format found for element '" . $element['name'] . "'");
                    }
                    $formats[] = $this->formats[$name];
                }
                $element['format'] = $formats;
            }

            // Add element to map by type/id.
            $this->map['elements'][$input['type']][$id] = $element;

            // Add element to map by type/name.
            if (isset($element['name'])) { // xx
                $this->map['elementsByName'][$input['type']][$element['name']] = $id;
            }
        }
    }
}
