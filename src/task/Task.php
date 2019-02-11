<?php
namespace scheduled\task;

/**
 * @author Matteo Merola <mattmezza@gmail.com>
 * @since  20181114 Initial creation.
 */
abstract class Task implements TaskObservable
{
    /** @var TaskObserver[] */
    protected $allObserver = [];

    /**
     * @return string
     */
    abstract public function getDescriptionString(): string;

    /**
     * @param TaskObserver $observer
     */
    public function addObserver(TaskObserver $observer)
    {
        $this->allObserver[] = $observer;
    }

    /**
     * @return TaskObserver[]
     */
    public function getAllObserver(): array
    {
        return $this->allObserver;
    }

    /**
     */
    public function notifyTaskWillExecute()
    {
        foreach ($this->allObserver as $observer) {
            $observer->beforeTaskExecution($this);
        }
    }

    /**
     */
    public function notifyTaskDidExecute()
    {
        foreach ($this->allObserver as $observer) {
            $observer->afterTaskExecution($this);
        }
    }

}
