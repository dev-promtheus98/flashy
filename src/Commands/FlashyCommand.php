<?php

namespace DevPromtheus98\Flashy\Commands;

use Illuminate\Console\Command;

class FlashyCommand extends Command
{
    public $signature = 'flashy';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
