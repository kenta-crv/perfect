<?php

namespace App\Traits;
use App\Helpers\PyScript;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

trait AtbbApiTrait
{
    public function getAtbbSampleResult()
    {

        $pyscript = new PyScript;

        return $pyscript->run_python('get_sample.py', 'atbb');
    }

    public function getAtbbLiveResult()
    {
        $pyscript = new PyScript;

        return $pyscript->run_python('main.py', 'atbb');
    }
}
