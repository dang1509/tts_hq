<?php 

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeEntity extends Command
{
    protected $signature = 'make:entity {name}';
    protected $description = 'Tạo một Entity mới trong App\Core\Domain\Entities';

    public function handle()
    {
        $name = $this->argument('name');

        // Chuyển đổi tên thành đường dẫn và namespace phù hợp
        $path = app_path("Core/Domain/Entities/" . str_replace('\\', '/', $name) . ".php");

        // Tách phần namespace và class name
        $className = basename(str_replace('\\', '/', $name)); // Lấy tên class
        
        $namespaceParts = explode('/', trim(dirname(str_replace('\\', '/', $name)), '.')); // Lấy phần namespace

        $namespace = 'App\\Core\\Domain\\Entities';
        if (!empty($namespaceParts) && $namespaceParts[0] !== '') {
            $namespace .= '\\' . implode('\\', $namespaceParts);
        }

        if (file_exists($path)) {
            $this->error("Entity {$name} already exists!");
            return;
        }

        $stub = <<<EOT
            <?php

            namespace {$namespace};

            class {$className}
            {
                public ?int \$id;
                public ?string \$name;

                public function __construct(array \$data)
                {
                    \$this->id = \$data['id'] ?? null;
                    \$this->name = \$data['name'] ?? null;
                }
            }
            EOT;

        (new Filesystem)->ensureDirectoryExists(dirname($path));
        file_put_contents($path, $stub);

        $this->info("Entity {$className} created successfully {$path}");
    }
}
