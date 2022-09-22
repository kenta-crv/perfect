<?php
namespace App\Traits;
use App\Traits\FlaskApiTrait;
use App\Traits\AtbbApiTrait;

trait SearchTrait
{
    public function testOnly()
    {
        return $this->getRoboreSampleResult();
    }
}
