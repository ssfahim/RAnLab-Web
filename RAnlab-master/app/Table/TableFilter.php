<?php

namespace App\Table;

class TableFilter
{
    public string $key;

    public string $label;

    public string $eventName;

    public $content;

    public function __construct($key, $label, $content)
    {
        $this->key = $key;
        $this->label = $label;
        $this->eventName = $key . 'FilterSelected';
        $this->content = $content;
    }

    public static function make($key, $label, $content)
    {
        return new static($key, $label, $content);
    }
}
