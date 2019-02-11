<?php
namespace scheduled\job;

/**
 * @author Matteo Merola <mattmezza@gmail.com>
 * @since  20190211 Initial creation.
 */
interface JobObserver
{
    /**
     * @param Job $job
     */
    public function beforeJobExecution(Job $job);

    /**
     * @param Job $job
     */
    public function afterJobExecution(Job $job);
}
