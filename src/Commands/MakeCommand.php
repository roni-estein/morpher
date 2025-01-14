<?php


namespace RicorocksDigitalAgency\Morpher\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeCommand extends Command
{

    protected $name = "make:morph";
    protected $signature = "make:morph {class}";
    protected $description = "Makes a new Morph class";

    public function handle()
    {
        $stub = file_get_contents(__DIR__ . '/../../stubs/Morph.php.stub');
        $class = str_replace(":CLASS_NAME:", $this->argument('class'), $stub);

        File::ensureDirectoryExists(database_path('morphs/'));

        File::put(database_path('morphs/' . Str::finish($this->argument('class'), ".php")), $class);
    }

}
