<?php
namespace scheduled\task;

use mattmezza\logger\LevelLogger;
use mattmezza\logger\Logger;

/**
 * @author Matteo Merola <mattmezza@gmail.com>
 * @since  20190211 Initial creation.
 */
class TaskLogger implements TaskObserver
{
    /**
     * Log string format constants.
     */
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
     * @param Task $task
     */
    public function beforeTaskExecution(Task $task)
    {
        $this->log->info(vsprintf(self::LOG_TASK_BEFORE_FORMAT, [$task->getDescriptionString()]));
    }

    /**
     * @param Task $task
     */
    public function afterTaskExecution(Task $task)
    {
        $this->log->info(vsprintf(self::LOG_TASK_AFTER_FORMAT, [$task->getDescriptionString()]));
    }
}
