scheduled job
=======

[![Travis (.org)](https://img.shields.io/travis/mattmezza/php-scheduled-job.svg)](https://github.com/mattmezza/php-scheduled-job)

## Installation

`composer require mattmezza/scheduled-job`

## Usage

##### 1. Create a task
```php
class MyTask extends TaskStandard {

    public function getDescriptionString(): string
    {
        return 'Task description';
    }

    public function run(array $allParam)
    {
        // do something
    }
}
```

##### 2. Create a job

```php
class MyJob extends JobStandard {

    public function getDescriptionString(): string
    {
        return 'Job description';
    }

    public function getAllTask(): array
    {
        return [
            new MyTask(),
        ];
    }
}
```

##### 3. Run the job

```php
(new JobExecutorStandard())->execute($job, $argv]);
```

##### 4. Observe jobs and tasks

You can attach observers to both jobs and tasks.

```php
$job->addObserver(new JobLogger());
$task->addObserver(new TaskLogger());
```

You can define custom observers by implementing `JobObserver` and `TaskObserver`.

##### 5. Automate with cron

Create a PHP script file that you can run via cron `~/your-project/your-job.php`:

```php
#!/usr/bin/env php

<?php

$job = ... # create the job as above

try {
    (new JobExecutorStandard())->execute($job, $argv]);
} catch (YourException $error) {
    // Oops, something happened...
}
```

Add the cron entry in the crontab via `crontab -e`:

```
# run five minutes after midnight, every day 
5 0 * * * $HOME/your-project/your-job.php >> $HOME/tmp/out 2>&1
```

## Development

- [ ] Would be nice to add different kind of jobs each one specialized in a particular way (i.e. memory intensive etc...)
