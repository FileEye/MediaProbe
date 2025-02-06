<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Model;

use FileEye\MediaProbe\Collection\CollectionInterface;
use FileEye\MediaProbe\Data\DataFile;
use FileEye\MediaProbe\Dumper\DebugDumper;
use FileEye\MediaProbe\Dumper\DumperInterface;
use FileEye\MediaProbe\ItemDefinition;
use Monolog\Handler\TestHandler;
use Monolog\Level;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * Base class for MediaProbe root block.
 */
abstract class RootBlockBase extends BlockBase
{
    /**
     * The Xpath object must be associated to the root element.
     */
    protected \DOMXpath $XPath;

    /**
     * The element dumper returning debug info for the elements.
     */
    protected DumperInterface $debugDumper;

    /**
     * The MIME type.
     */
    protected string $mimeType;

    /**
     * @param CollectionInterface $collection
     *   The Collection of this Block.
     * @param Logger $logger
     *   The internal Monolog logger instance for this Media object.
     * @param ?Level $failLevel
     *   (Optional) The minimum log level for failure.
     *   MediaProbe normally intercepts and logs media parsing issues without breaking the flow.
     *   However it is possible to enable hard failures by defining the minimum log level at
     *   which the parsing process will break and throw a MediaProbeException.
     * @param ?LoggerInterface $externalLogger
     *   (Optional) a PSR-3 compliant logger callback. Consuming code can have higher level
     *   logging facilities in place. Any entry sent to the internal logger will also be sent to
     *   the callback, if specified.
     * @param Stopwatch $stopWatch
     *   (Optional) A Symfony stopwatch.
     */
    public function __construct(
        CollectionInterface $collection,
        protected Logger $logger,
        protected ?Level $failLevel = null,
        protected ?LoggerInterface $externalLogger = null,
        protected Stopwatch $stopWatch = new Stopwatch(),
    ) {
        $doc = new \DOMDocument();
        $doc->registerNodeClass(\DOMElement::class, DOMElement::class);
        $this->DOMNode = $doc->createElement($collection->getPropertyValue('DOMNode'));
        $doc->appendChild($this->DOMNode);
        $this->DOMNode->setMediaProbeElement($this);
        $this->XPath = new \DOMXPath($this->DOMNode->ownerDocument);
        parent::__construct(new ItemDefinition($collection));

        $this->debugDumper = new DebugDumper();
    }

    /**
     * Returns the log entries of the Media object.
     *
     * @param string $level_name
     *   (Optional) If specified, filters only the entries of the specified severity level.
     *
     * @return array
     *   An array of Monolog entries.
     */
    public function dumpLog(?string $level_name = null): array
    {
        $handler = $this->logger->getHandlers()[0];
        assert($handler instanceof TestHandler);
        $ret = [];
        foreach ($handler->getRecords() as $record) {
            if (($level_name && $record['level_name'] === $level_name) || !$level_name) {
                $ret[] = $record;
            }
        }
        return $ret;
    }

    public function getMimeType(): string
    {
        return $this->mimeType ?? '';
    }

    public function getStopwatch(): Stopwatch
    {
        return $this->stopWatch;
    }

    public function collectInfo(array $context = []): array
    {
        $info = [];
        $msg = '';

        if (isset($context['dataElement'])) {
            if ($context['dataElement'] instanceof DataFile) {
                $msg .= 'file: ' . basename($context['dataElement']->filePath) . ' ';
            }
            $msg .= 'size: {size} byte(s)';
            $info['size'] = $context['dataElement']->getSize();
        }

        $info['mimeType'] = $this->getMimeType();

        if ($info['mimeType']) {
            $msg .= ' MIME type: {mimeType}';
        }

        $info['_msg'] = $msg;

        return $info;
    }
}
