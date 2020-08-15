<?php

declare(strict_types=1);

namespace MonologModule\Formatter;

use Laminas\ServiceManager\AbstractPluginManager;
use Laminas\ServiceManager\Exception\InvalidServiceException;
use MonologModule\Exception;
use Monolog\Formatter\FormatterInterface;

class FormatterPluginManager extends AbstractPluginManager
{
    protected $instanceOf = FormatterInterface::class;

    /**
     * @param  mixed $instance
     * @throws InvalidServiceException
     */
    public function validate($instance) : void
    {
        if (! $instance instanceof $this->instanceOf) {
            throw new InvalidServiceException(sprintf(
                '%s can only create instances of %s; %s is invalid',
                get_class($this),
                $this->instanceOf,
                (is_object($instance) ? get_class($instance) : gettype($instance))
            ));
        }
    }

    /**
     * @param  mixed $instance
     * @throws Exception\InvalidArgumentException
     */
    public function validatePlugin($instance) : void
    {
        $this->validate($instance);
    }
}
