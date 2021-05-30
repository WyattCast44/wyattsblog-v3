<?php

namespace App\Console\Commands;

use ImageOptimizer;
use Illuminate\Console\Command;
use Symfony\Component\Finder\Finder;

class OptimizeAllPrevUploadedImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'optimize-uploaded-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize all existing uploaded images';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $finder = new Finder();

        $finder->files()
            ->name('*.png')
            ->name('*.jpeg')
            ->name('*.jpg')
            ->name('*.jiff')
            ->name('*.gif');

        foreach ($finder->in(storage_path('app/public/media')) as $file) {
            logger('Optimizing Image: ', [
                'path' => $file,
            ]);
            ImageOptimizer::optimize((string) $file);
        }

        $finder = new Finder();

        $finder->files()
            ->name('*.png')
            ->name('*.jpeg')
            ->name('*.jpg')
            ->name('*.jiff')
            ->name('*.gif');

        foreach ($finder->in(public_path()) as $file) {
            logger('Optimizing Image: ', [
                'path' => $file,
            ]);
            ImageOptimizer::optimize((string) $file);
        }

        return 0;
    }
}
