<?php
namespace scheduled\executor;

use scheduled\job\Job;

/**
 * @author Matteo Merola <mattmezza@gmail.com>
 * @since  20190211 Initial creation.
 */
interface JobExecutor
{
    /**
     * @param Job $job
     * @param string[] $argv
     */
    public function execute(Job $job, array $argv = []);
}
