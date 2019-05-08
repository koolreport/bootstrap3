<?php 

namespace koolreport\bootstrap3;

trait Theme
{
    protected function __constructBoostrap3Theme()
    {
        $this->theme = new Bootstrap3Theme($this);
    }
}