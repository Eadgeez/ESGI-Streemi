<?php

namespace App\Enum;

enum CommentStatusEnum: string
{
    case VALID = 'valid';
    case PENDING = 'pending';
    case REJECTED = 'rejected';
}
