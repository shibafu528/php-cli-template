<?php

namespace Lib\Contracts;

interface Config extends \ArrayAccess
{
    public function get($key = null, $default = null);

    public function has($keys);

    public function isEmpty($keys = null);
}