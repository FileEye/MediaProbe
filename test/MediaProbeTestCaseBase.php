<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\ElementInterface;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\MediaProbe;
use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\Version;

require_once __DIR__ . '/MediaProbePhpUnit8Trait.php';

class MediaProbeTestCaseBase extends TestCase
{
    use PhpUnitTrait;

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
        }*(
    }
}
