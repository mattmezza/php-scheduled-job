<?php
namespace scheduled\job;

use mattmezza\logger\LevelLogger;
use mattmezza\logger\Logger;

/**
 * @author Matteo Merola <mattmezza@gmail.com>
 * @since  20190211 Initial creation.
 */
class JobLogger implements JobObserver
{
    /**
     * Log string format constants.
     */
    const LOG_JOB_BEFORE_FORMAT = 'The job "%s" will be executed now...';
    const LOG_JOB_AFTER_FORMAT = 'The job "%s" has just been executed...';
    const LOG_TASK_BEFORE_FORMAT = 'The task "%s" will be executed now...';
    const LOG_TASK_AFTER_FORMAT = 'The task "%s" has just been executed...';

    /** @var Logger */
    protected $log;

    /**
     */
    public function __construct()
    {
        $this->log = new LevelLogger();
    }

    /**
     * @param Job $job
     */
    public function beforeJobExecution(Job $job)
    {
        $this->log->info(vsprintf(self::LOG_JOB_BEFORE_FORMAT, [$job->getDescriptionString()]));
    }

    /**
     * @param Job $job
     */
    public function afterJobExecution(Job $job)
    {
        $this->log->info(vsprintf(self::LOG_JOB_AFTER_FORMAT, [$job->getDescriptionString()]));
    }
}
