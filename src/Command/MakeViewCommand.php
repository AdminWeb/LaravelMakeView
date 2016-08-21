<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 21/08/16
 * Time: 11:51
 */

namespace Laravel\Command;

use Illuminate\Console\Command;

class MakeViewCommand extends Command
{

    protected $signature = 'make:view {layout?} {section?}';
    protected $description = 'Add command to make view on artisan tool';

    public function __construct()
    {
        parente::__construct();
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
            if (!is_dir(resource_path('views/' . $path))) {
                mkdir(resource_path('views/' . $path));
            }
        }
        if ($layout) {
            $content .= "@extends('{$layout}')\n\n";
        }
        if ($section) {
            $content .= "@section('{$section}') \n\n\n\n\n@endsection";
        }
        file_put_contents(resource_path('views/' . $path . $view . '.blade.php'), $content);
        $this->info('Success on created view.');

    } f
}