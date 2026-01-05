<?php

namespace app\enums;

enum Status: string{
    case PENDING = 'PENDING';
    case RESOLVED = 'RESOLVED';
    case DISMISSED  = 'DISMISSED';
}