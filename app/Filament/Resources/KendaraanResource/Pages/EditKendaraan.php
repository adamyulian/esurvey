<?php

namespace App\Filament\Resources\KendaraanResource\Pages;

use App\Filament\Resources\KendaraanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Guava\FilamentDrafts\Admin\Resources\Pages\Edit\Draftable;
use Illuminate\Support\Facades\Auth;

class EditKendaraan extends EditRecord

{

    protected static string $resource = KendaraanResource::class;

    protected static ?string $title = 'Halaman Survey';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->hidden(Auth::user()->name !== 'admin'),
        ];
    }
}
