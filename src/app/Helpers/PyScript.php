<?php
namespace App\Helpers;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class PyScript
{
    private const SCRIPT_PATH = "/app/Scripts/";

    public static function run_python($filename, $folder = ""){
        $is_production = env('APP_ENV') === 'production' ? true : false;
        $python = $is_production ? 'python3' : 'python';
        $command = [$python , base_path(). self::SCRIPT_PATH .'/'. $folder .'/'. $filename];
        set_time_limit(240);
        $process = new Process($command);
        $process->setTimeout(240);
        $process->run();

        // Revert Time Limit
        set_time_limit(60);


        // executes after the command finishes
        if (!$process->isSuccessful()) {
            // throw new ProcessFailedException($process);
            return false;
        }

        return json_decode($process->getOutput(), true);
    }
}
