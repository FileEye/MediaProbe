<?php
// @codingStandardsIgnoreFile

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Collection\CollectionInterface;
use FileEye\MediaProbe\Dumper\DefaultDumper;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Model\ElementInterface;
use FileEye\MediaProbe\Model\EntryInterface;
use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\Version;
use Symfony\Component\Filesystem\Filesystem;

class MediaProbeTestCaseBase extends TestCase
{
    protected Filesystem $fileSystem;
    protected string $tempWorkDirectory;

    public function setUp(): void
    {
        parent::setUp();
        $this->tempWorkDirectory = dirname(__FILE__) . '/workdir-test';
        $this->fileSystem = new Filesystem();
        $this->fileSystem->mkdir($this->tempWorkDirectory);
    }

    /**
     * Returns a stub RootBlock that can be used to append test structures.
     */
    protected function getStubRoot(string $DOMName = 'StubRoot'): StubRootBlock
    {
        $collection = $this->getMockBuilder(CollectionInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $collection->method('getPropertyValue')->with('DOMNode')->willReturn($DOMName);
        $itemDefinition = $this->getMockBuilder(ItemDefinition::class)
            ->disableOriginalConstructor()
            ->getMock();
        $itemDefinition->method('getCollection')->willReturn($collection);
        return new StubRootBlock($itemDefinition);
    }

    public function dumpElement(ElementInterface $element)
    {
        dump($element->asArray(new DefaultDumper()));
/*        if ($element instanceof EntryInterface) {
            $ifd_name = $element->getParentElement()->getParentElement()->getAttribute('name') ?: $element->getParentElement()->getAttribute('name');
            $tag_title = $element->getParentElement()->getCollection()->getPropertyValue('title') ?? '*na*';
            dump([$ifd_name, $tag_title, $element->toString()]);
            return;
        }
        foreach ($element->getMultipleElements('*') as $sub_element) {
            $this->dumpElement($sub_element);
        }*/
    }
}
