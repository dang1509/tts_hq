<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Filesystem\Filesystem;
class MakeReponsitoryInterface extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:respository-interface {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tạo một interface cho repository';

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
        $name = $this->argument('name');

        $path = app_path("Core/Domain/Repositories/" . str_replace('\\', '/', $name) . ".php");
    
        // Tách phần namespace và class name
        $className = basename(str_replace('\\', '/', $name)); // Lấy tên class
    
        $namespaceParts = explode('/', trim(dirname(str_replace('\\', '/', $name)), '.')); // Lấy phần namespace
    
        $namespace = 'App\\Core\\Domain\\Repositories';
        if (!empty($namespaceParts) && $namespaceParts[0] !== '') {
            $namespace .= '\\' . implode('\\', $namespaceParts);
        }

        if (file_exists($path)) {
            $this->error("Repositories Interface {$name} already exists!");
            return;
        }

        $stub = <<<EOT
            <?php
            
            namespace {$namespace};
            
            interface {$className}
            {
                
            }
            EOT;

        (new Filesystem)->ensureDirectoryExists(dirname($path));
        file_put_contents($path, $stub);

        $this->info("Repositories Interface {$className} created successfully {$path}");
    }
}
