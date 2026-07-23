<?php

declare(strict_types=1);

namespace LaravibeStandards\LaravibeStandards\Console\Commands;

use Illuminate\Console\Command;

class LaravibeStandardsCommand extends Command
{
    /**
     * The command signature.
     */
    protected $signature = 'laravibe-standards:placeholder';

    /**
     * The command description.
     */
    protected $description = 'Placeholder Artisan command shipped by the package laravibe-standards.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->line('LaravibeStandards placeholder command executed.');

        return self::SUCCESS;
    }
}
