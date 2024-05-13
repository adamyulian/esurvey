<?php

namespace App\Filament\Exports;

use App\Models\Kendaraan;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class KendaraanExporter extends Exporter
{
    protected static ?string $model = Kendaraan::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('opd'),
            ExportColumn::make('lokasi'),
            ExportColumn::make('penyelia'),
            ExportColumn::make('sesi'),
            ExportColumn::make('register'),
            ExportColumn::make('deskripsi'),
            ExportColumn::make('jenis'),
            ExportColumn::make('nama'),
            ExportColumn::make('merk'),
            ExportColumn::make('tipe'),
            ExportColumn::make('tahun_pengadaan'),
            ExportColumn::make('kondisi'),
            ExportColumn::make('kategori'),
            ExportColumn::make('no_mesin'),
            ExportColumn::make('no_rangka'),
            ExportColumn::make('nopol'),
            ExportColumn::make('nilai_perolehan'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
            ExportColumn::make('kondisi_riil'),
            ExportColumn::make('penanggung_jawab'),
            ExportColumn::make('jabatan'),
            ExportColumn::make('bidang'),
            ExportColumn::make('bbm'),
            ExportColumn::make('pemakaian'),
            ExportColumn::make('angka_speedometer'),
            ExportColumn::make('gambar_speedometer'),
            ExportColumn::make('gambar_mesin'),
            ExportColumn::make('gambar_interior'),
            ExportColumn::make('gambar_eksterior'),
            ExportColumn::make('gambar_nokanosin'),
            ExportColumn::make('nokasin'),
            ExportColumn::make('keterangan'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your kendaraan export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
