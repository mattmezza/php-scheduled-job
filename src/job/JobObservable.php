<?php
namespace scheduled\job;

/**
 * @author Matteo Merola <mattmezza@gmail.com>
 * @since  20190211 Initial creation.
 */
interface JobObservable
{
    /**
     * @param JobObserver $observer
     */
    public function addObserver(JobObserver $observer);

    /**
     * @return JobObserver[]
     */
    public function getAllObserver(): array;

    /**
     */
    public function notifyJobWillExecute();

    /**
     */
    public function notifyJobDidExecute();
}
