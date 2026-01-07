<?php

namespace helpers\functions;

function dd($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}
