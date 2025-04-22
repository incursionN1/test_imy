<?php

class DataTable
{
    protected $entity;
    protected $database;
    protected $info;

    function __construct($entity, $database = 'default')
    {
        $this->entity = $entity;
        $this->database = $database;
    }

    function create($data)
    {
        $this->info = M($this->entity, $this->database)->factory();
        return $this->set($data);
    }

    function set($key, $val = false)
    {
        if (is_array($key)) {
            $this->info->setValues($key);
        } else {
            $this->info->setValue($key, $val);
        }

        return $this->info->save();
    }
    function get()
    {
        $reviews = M($this->entity, $this->database)->get();
        return $reviews->fetchAssocAll();
    }


}