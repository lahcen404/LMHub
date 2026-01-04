<?php

namespace app\enums;

enum Role: string{
    case ADMIN = 'ADMIN';
    case AUTHOR = 'AUTHOR';
    case READER = 'READER';
}