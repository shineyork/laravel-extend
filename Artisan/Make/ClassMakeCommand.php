<?php

namespace ShineYork\LaravelExtend\Artisan\Make;

use Illuminate\Console\GeneratorCommand as Commad;

class ClassMakeCommand extends Commad
{
    use GeneratorCommand;

    protected $signature = 'extend-make:class {name}';

    protected $description = '为laravel-shop快速创建一个类';

    protected $type = 'Class';


    protected function getStub()
    {
        return __DIR__.'/stubs/class.stub';
    }

    protected function rootNamespace()
    {
        return $this->namespace;
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the class'],
        ];
    }
}
