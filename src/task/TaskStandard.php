<?php
namespace scheduled\task;

/**
 * @author Matteo Merola <mattmezza@gmail.com>
 * @since  20181114 Initial creation.
 */
abstract class TaskStandard extends Task
{
    /**
     * @param string[] $allParam
     */
    abstract public function run(array $allParam);

    /**
     * @param string[] $allParam
     */
    public function execute(array $allParam)
    {
        $this->notifyTaskWillExecute();
        $this->run($allParam);
        $this->notifyTaskDidExecute();
    }
}
