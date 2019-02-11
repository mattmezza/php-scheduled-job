<?php
namespace scheduled\job;

use scheduled\task\TaskStandard;

/**
 * @author Matteo Merola <mattmezza@gmail.com>
 * @since  20181114 Initial creation.
 */
abstract class JobStandard extends Job
{
    /**
     * @return TaskStandard[]
     */
    abstract public function getAllTask(): array;

    /**
     * @param string[] $argv
     */
    public function execute(array $argv = [])
    {
        $this->notifyJobWillExecute();

        foreach ($this->getAllTask() as $task) {
            $task->run($argv);
        }

        $this->notifyJobDidExecute();
    }
}
