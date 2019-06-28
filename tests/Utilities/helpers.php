<?php

function create($class, $att = [])
{
    return factory($class)->create($att);
}
