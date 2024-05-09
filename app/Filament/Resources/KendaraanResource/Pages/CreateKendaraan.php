<?php

namespace App\Filament\Resources\KendaraanResource\Pages;

use App\Filament\Resources\KendaraanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Guava\FilamentDrafts\Admin\Resources\Pages\Create\Draftable;

class CreateKendaraan extends CreateRecord
{
    use Draftable;

    protected static string $resource = KendaraanResource::class;
}
