<?php


namespace VDB\Spider\Event;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

trait DispatcherTrait
{
    private EventDispatcherInterface $dispatcher;

    /**
     * @return EventDispatcherInterface
     */
    public function getDispatcher(): EventDispatcherInterface
    {
        if (!isset($this->dispatcher)) {
            $this->dispatcher = new EventDispatcher();
        }

        return $this->dispatcher;
    }

    /**
     * A shortcut for EventDispatcher::dispatch()
     *
     * @param object $event
     * @param string $eventName
     */
    protected function dispatch(object $event, string $eventName): void
    {
        $this->getDispatcher()->dispatch($event, $eventName);
    }
}
