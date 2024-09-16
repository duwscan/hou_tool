<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Faculty extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Tiện ích';
    protected static ?string $navigationLabel = 'Trường học';
    protected static ?string $clusterBreadcrumb = 'Trường học';
}
