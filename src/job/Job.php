<?php
namespace scheduled\job;

/**
 * @author Matteo Merola <mattmezza@gmail.com>
 * @since  20181114 Initial creation.
 */
abstract class Job implements JobObservable
{
    /** @var JobObserver[] */
    protected $allObserver = [];

    /**
     * @return string
     */
    abstract public function getDescriptionString(): string;

    /**
     * @param string[] $argv
     */
    abstract public function execute(array $argv = []);

    /**
     * @param JobObserver $observer
     */
    public function addObserver(JobObserver $observer)
    {
        $this->allObserver[] = $observer;
    }

    /**
     * @return JobObserver[]
     */
    public function getAllObserver(): array
    {
        return $this->allObserver;
    }

    /**
     */
    public function notifyJobWillExecute()
    {
        foreach ($this->allObserver as $observer) {
            $observer->beforeJobExecution($this);
        }
    }

    /**
     */
    public function notifyJobDidExecute()
    {
        foreach ($this->allObserver as $observer) {
            $observer->afterJobExecution($this);
        }
    }

}
