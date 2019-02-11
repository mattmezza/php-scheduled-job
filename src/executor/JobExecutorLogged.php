<?php
namespace scheduled\executor;

use scheduled\job\Job;
use mattmezza\logger\LevelLogger;
use mattmezza\logger\Logger;

/**
 * @author Matteo Merola <mattmezza@gmail.com>
 * @since  20190211 Initial creation.
 */
class JobExecutorLogged implements JobExecutor
{
    /**
     * Log format string.
     */
    const LOG_COMPLETION_FORMAT = 'The job "%s" has been completed.';
    const LOG_ERROR_FORMAT = 'The job "%s" has NOT been completed because of the following error:';

    /** @var Logger */
    protected $log;

    /**
     * @param Job $job
     * @param string[] $argv
     */
    public function execute(Job $job, array $argv = [])
    {
        try {
            $this->log = new LevelLogger();
            $job->execute($argv);
            $this->log->info(
                vsprintf(
                    self::LOG_COMPLETION_FORMAT,
                    [
                        $job->getDescriptionString(),
                    ]
                )
            );
        } catch (\Throwable $throwable) {
            $this->log->info(
                vsprintf(
                    self::LOG_ERROR_FORMAT,
                    [
                        $job->getDescriptionString(),
                    ]
                )
            );
            $this->log->error($throwable->getMessage() . PHP_EOL . $throwable->getTraceAsString());
        }
    }
}
