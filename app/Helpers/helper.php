<?php

function document_root($path) 
{
    return $_SERVER['DOCUMENT_ROOT'] . '/' . $path;
}

function view($path)
{
    return document_root('/views/' . $path);
}