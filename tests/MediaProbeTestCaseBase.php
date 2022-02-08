<?php
// @codingStandardsIgnoreFile

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\ElementInterface;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\MediaProbe;
use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\Version;

class MediaProbeTestCaseBase extends TestCase
{
    protected $fileSystem;
    protected $tempWorkDirectory;

    public function setUp(): void
    {
        parent::setUp();
        $this->tempWorkDirectory = dirname(__FILE__) . '/workdir-test';
        $this->fileSystem = new Filesystem();
        $this->fileSystem->mkdir($this->tempWorkDirectory);
    }

    public function fcExpectException($exception, $message = null)
    {
        if (method_exists($this, 'expectException')) {
            $this->expectException($exception);
            if ($message !== null) {
                $this->expectExceptionMessage($message);
            }
        } else {
            $this->setExpectedException($exception, $message);
        }
    }

    public function dumpElement(ElementInterface $element)
    {
        dump($element->toDumpArray());
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
