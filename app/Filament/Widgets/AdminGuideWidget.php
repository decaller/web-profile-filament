<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class AdminGuideWidget extends Widget
{
    protected string $view = 'filament.widgets.admin-guide-widget';

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = -1; // Highest priority
}
