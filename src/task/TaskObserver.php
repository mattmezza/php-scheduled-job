<?php
namespace scheduled\task;

/**
 * @author Matteo Merola <mattmezza@gmail.com>
 * @since  20190211 Initial creation.
 */
interface TaskObserver
{
    /**
     * @param Task $task
     */
    public function beforeTaskExecution(Task $task);

    /**
     * @param Task $task
     */
    public function afterTaskExecution(Task $task);
}
