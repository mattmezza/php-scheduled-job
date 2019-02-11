<?php
namespace scheduled\task;

/**
 * @author Matteo Merola <mattmezza@gmail.com>
 * @since  20190211 Initial creation.
 */
interface TaskObservable
{
    /**
     * @param TaskObserver $observer
     */
    public function addObserver(TaskObserver $observer);

    /**
     * @return TaskObserver[]
     */
    public function getAllObserver(): array;

    /**
     */
    public function notifyTaskWillExecute();

    /**
     */
    public function notifyTaskDidExecute();
}
