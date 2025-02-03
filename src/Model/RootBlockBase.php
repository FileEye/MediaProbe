<?php declare(strict_types=1);

namespace FileEye\MediaProbe\Model;

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
     * The internal Monolog logger instance for this Media object.
     */
    protected Logger $logger;

    /**
     * The minimum log level for failure.
     *
     * MediaProbe normally intercepts and logs media parsing issues without
     * breaking the flow. However it is possible to enable hard failures by
     * defining the minimum log level at which the parsing process will break
     * and throw an MediaProbeException.
     */
    //protected ?Level $failLevel;

    /**
     * A Symfony stopwatch.
     */
    protected Stopwatch $stopWatch;

    /**
     * @param \FileEye\MediaProbe\ItemDefinition $definition
     *   The Item Definition of this Block.
     */
    public function __construct(
        ItemDefinition $definition,
        protected ?Level $failLevel = null,
        protected ?LoggerInterface $externalLogger = null,
    )
    {
        parent::__construct($definition);
        $this->XPath = new \DOMXPath($this->DOMNode->ownerDocument);
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

    public function getStopwatch(): Stopwatch
    {
        return $this->stopWatch;
    }
}
