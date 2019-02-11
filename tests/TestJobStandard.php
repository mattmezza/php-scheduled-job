<?php
namespace scheduled\test;

use scheduled\executor\JobExecutorLogged;
use scheduled\job\JobStandard;
use scheduled\task\TaskStandard;
use PHPUnit\Framework\TestCase;

/**
 * @author Matteo Merola <mattmezza@gmail.com>
 * @since  20190211 Initial creation.
 */
class TestJobStandard extends TestCase
{
    /**
     * Description constant.
     */
    const DESCRIPTION = 'Ceci c\'est pas une description.';

    /**
     */
    public function testJobStandard()
    {
        $job = new class extends JobStandard {

            /**
             * @return string
             */
            public function getDescriptionString(): string
            {
                return TestJobStandard::DESCRIPTION;
            }

            /**
             * @return TaskStandard[]
             */
            public function getAllTask(): array
            {
                return [
                    new class extends TaskStandard {

                        /**
                         * @return string
                         */
                        public function getDescriptionString(): string
                        {
                            return TestJobStandard::DESCRIPTION;
                        }

                        /**
                         * @param string[] $allParam
                         */
                        public function run(array $allParam)
                        {
                            echo array_shift($allParam) . PHP_EOL . TestJobStandard::DESCRIPTION;
                        }
                    }
                ];
            }
        };

        $random = strval(crc32(uniqid()));
        ob_start();
        (new JobExecutorLogged())->execute($job, [$random]);
        $output = ob_get_clean();
        static::assertContains($random, $output);
        static::assertContains(self::DESCRIPTION, $output);
    }
}
