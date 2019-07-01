<?php

function create($class, $att = [], $number = null)
{
    return factory($class, $number)->create($att);
}
