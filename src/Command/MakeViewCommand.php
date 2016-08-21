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
        $layout = $arguments['layout'];
        $section = $arguments['section'];
        $path = $this->makePath($arguments['view']);
        $content = $this->getContent($layout, $section);
        $this->createView($path, $content);
    }

    private function makePath($view)
    {
        $paths = explode('.', $view);
        $view = end($paths);
        $path = '';
        $count = count($paths) - 1;
        for ($i = 0; $i < $count; $i++) {
            $path .= $paths[$i] . '/';
            if (!is_dir($this->path . '/resources/views/' . $path)) {
                mkdir($this->path . '/resources/views/' . $path);
            }
        }
        return $this->path . '/resources/views/' . $path . $view;
    }

    private function getContent($layout, $section)
    {
        $content = '';
        if ($layout) {
            $content .= "@extends('{$layout}')\n\n";
        }
        if ($section) {
            $content .= "@section('{$section}') \n\n\n\n\n@endsection";
        }
        return $content;
    }

    private function createView($path, $content)
    {
        file_put_contents($path . '.blade.php', $content);
        $this->info('Success on created view.');
    }
}