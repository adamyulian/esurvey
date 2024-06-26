<?php

namespace App\Filament\Resources\KendaraanResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KendaraanResource;
use Filament\Resources\Pages\ListRecords\Tab;
use Guava\FilamentDrafts\Admin\Resources\Pages\List\Draftable;

class ListKendaraans extends ListRecords
{


    protected static string $resource = KendaraanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        return [
            'Belum Survey' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('kondisi_riil', NULL))
                ->icon('heroicon-m-document-minus'),
            'Draft Survey' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('is_published', false)->whereNotNull('kondisi_riil'))
                ->icon('heroicon-m-pencil-square'),
            'Survey Rilis' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('is_published', true))
                ->icon('heroicon-m-document-check'),
        ];
    }
}
