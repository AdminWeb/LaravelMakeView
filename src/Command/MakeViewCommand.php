<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 21/08/16
 * Time: 11:51
 */

namespace LaravelMakeView\Command;

use Illuminate\Console\Command;

class MakeViewCommand extends Command
{

    protected $signature = 'make:view {view} {layout?} {section?}';
    protected $description = 'Add command to make view on artisan tool';

    private $path = null;

    public function __construct($mainpath)
    {
        $this->path = $mainpath;
        parent::__construct();
    }

    public function handle()
    {
        $arguments = $this->argument();
        $view = $arguments['view'];
        $layout = $arguments['layout'];
        $section = $arguments['section'];
        $paths = explode('.', $view);
        $view = end($paths);
        $path = '';
        $content = '';
        $count = count($paths) - 1;
        for ($i = 0; $i < $count; $i++) {
            $path .= $paths[$i] . '/';
            if (!is_dir($this->path . '/resources/views/' . $path)) {
                mkdir($this->path . '/resources/views/' . $path);
            }
        }
        if ($layout) {
            $content .= "@extends('{$layout}')\n\n";
        }
        if ($section) {
            $content .= "@section('{$section}') \n\n\n\n\n@endsection";
        }
        file_put_contents($this->path . '/resources/views/' . $path . $view . '.blade.php', $content);
        $this->info('Success on created view.');


    }
}