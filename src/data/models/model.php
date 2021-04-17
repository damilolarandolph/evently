<?php

abstract class Model
{
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function getTable()
    {
        return $this->table;
    }
}

function getPublicVars($model)
{
    return get_object_vars($model);
}
