<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/15
 * Time: 19:13
 */

namespace rabbit\pool;

/**
 * Class PoolProperties
 * @package rabbit\pool
 */
class PoolProperties implements PoolConfigInterface
{
    /**
     * Pool name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Minimum active number of connections
     *
     * @var int
     */
    protected $minActive = 5;

    /**
     * Maximum active number of connections
     *
     * @var int
     */
    protected $maxActive = 10;

    /**
     * Maximum waiting for the number of connections, if there is no limit to 0
     *
     * @var int
     */
    protected $maxWait = 20;

    /**
     * @var \SplQueue
     */
    protected $waitStack;

    /**
     * Maximum waiting time
     *
     * @var int
     */
    protected $maxWaitTime = 3;

    /**
     * Maximum idle time
     *
     * @var int
     */
    protected $maxIdleTime = 60;

    /**
     * Connection timeout
     *
     * @var float
     */
    protected $timeout = 3;

    /**
     * Connection addresses
     * <pre>
     * [
     *  '127.0.0.1:88',
     *  '127.0.0.1:88'
     * ]
     * </pre>
     *
     * @var array
     */
    protected $uri = [];

    /**
     * Initialize
     */
    public function __construct()
    {
        if (empty($this->name)) {
            $this->name = uniqid();
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getMaxActive(): int
    {
        return $this->maxActive;
    }

    /**
     * @return int
     */
    public function getMaxWait(): int
    {
        return $this->maxWait;
    }

    public function getWaitStack(): \SplQueue
    {
        if ($this->waitStack === null) {
            $this->waitStack = new \SplQueue();
        }
        return $this->waitStack;
    }

    /**
     * @return float
     */
    public function getTimeout(): float
    {
        return $this->timeout;
    }

    /**
     * @return array
     */
    public function getUri(): array
    {
        return $this->uri;
    }

    /**
     * @return int
     */
    public function getMinActive(): int
    {
        return $this->minActive;
    }

    /**
     * @return int
     */
    public function getMaxWaitTime(): int
    {
        return $this->maxWaitTime;
    }

    /**
     * @return int
     */
    public function getMaxIdleTime(): int
    {
        return $this->maxIdleTime;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return \get_object_vars($this);
    }
}