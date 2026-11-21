<?php

namespace App\Enums;

/**
 * Summary of Boxes Types
 */
enum BoxType :string
{
    case Subscription = 'subscription';
    case Gift = 'gift';
    case Single = 'single';
}
