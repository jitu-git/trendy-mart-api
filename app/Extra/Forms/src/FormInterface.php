<?php


namespace App\Extra\Forms\src;


interface FormInterface
{
    public function form() : array;

    public function build(array $field);
}