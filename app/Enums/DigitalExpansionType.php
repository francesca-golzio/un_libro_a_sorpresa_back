<?php

namespace App\Enums;

/**
 * Summary of DigitalExpansion Types
 */
enum DigitalExpansionType : string
{
    case Text = 'text';
    case Pdf = 'pdf';
    case Link = 'link';
    case Audio = 'audio';
}
