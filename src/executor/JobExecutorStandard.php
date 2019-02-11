<?php
namespace scheduled\executor;

use scheduled\job\Job;

/**
 * @author Matteo Merola <mattmezza@gmail.com>
 * @since  20181116 Initial creation.
 */
class JobExecutorStandard implements JobExecutor
{
    /**
     * @param Job $job
     * @param string[] $argv
     */
    public function execute(Job $job, array $argv = [])
    {
        $job->execute($argv);
    }
}
