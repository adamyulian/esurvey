<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KendaraanResource\Pages;
use App\Filament\Resources\KendaraanResource\RelationManagers;
use App\Models\Kendaraan;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Guava\FilamentDrafts\Admin\Resources\Concerns\Draftable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KendaraanResource extends Resource
{

    protected static ?string $model = Kendaraan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('Informasi Kendaraan')
                            ->columnSpanFull()
                            ->schema([
                                Forms\Components\Select::make('opd')
                                    ->disabledOn('edit')
                                    ->required()
                                    ->options([
                                        'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA'=>'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA',
                                        'BADAN KESATUAN BANGSA, POLITIK DAN PERLINDUNGAN MASYARAKAT'=>'BADAN KESATUAN BANGSA, POLITIK DAN PERLINDUNGAN MASYARAKAT',
                                        'BADAN PENANGGULANGAN BENCANA'=>'BADAN PENANGGULANGAN BENCANA',
                                        'BADAN PENDAPATAN DAERAH'=>'BADAN PENDAPATAN DAERAH',
                                        'BADAN PERENCANAAN PEMBANGUNAN DAERAH, PENELITIAN DAN PENGEMBANGAN'=>'BADAN PERENCANAAN PEMBANGUNAN DAERAH, PENELITIAN DAN PENGEMBANGAN',
                                        'DINAS KESEHATAN'=>'DINAS KESEHATAN',
                                        'DINAS KETAHANAN PANGAN DAN PERTANIAN'=>'DINAS KETAHANAN PANGAN DAN PERTANIAN',
                                        'DINAS LINGKUNGAN HIDUP'=>'DINAS LINGKUNGAN HIDUP',
                                        'DINAS PERHUBUNGAN'=>'DINAS PERHUBUNGAN',
                                        'DINAS PERPUSTAKAAN DAN KEARSIPAN'=>'DINAS PERPUSTAKAAN DAN KEARSIPAN',
                                        'DINAS PERUMAHAN RAKYAT DAN KAWASAN PERMUKIMAN SERTA PERTANAHAN'=>'DINAS PERUMAHAN RAKYAT DAN KAWASAN PERMUKIMAN SERTA PERTANAHAN',
                                        'DINAS SUMBER DAYA AIR DAN BINA MARGA'=>'DINAS SUMBER DAYA AIR DAN BINA MARGA',
                                        'KECAMATAN GUBENG'=>'KECAMATAN GUBENG',
                                        'KECAMATAN GUNUNG ANYAR'=>'KECAMATAN GUNUNG ANYAR',
                                        'KECAMATAN KREMBANGAN'=>'KECAMATAN KREMBANGAN',
                                        'KECAMATAN SAMBIKEREP'=>'KECAMATAN SAMBIKEREP',
                                        'KECAMATAN SEMAMPIR'=>'KECAMATAN SEMAMPIR',
                                        'KECAMATAN SIMOKERTO'=>'KECAMATAN SIMOKERTO',
                                        'SATUAN POLISI PAMONG PRAJA'=>'SATUAN POLISI PAMONG PRAJA',
                                        'SEKRETARIAT DPRD'=>'SEKRETARIAT DPRD',
                                        'BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH'=>'BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH',
                                        'DINAS KEBUDAYAAN, KEPEMUDAAN DAN OLAH RAGA SERTA PARIWISATA'=>'DINAS KEBUDAYAAN, KEPEMUDAAN DAN OLAH RAGA SERTA PARIWISATA',
                                        'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL'=>'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL',
                                        'DINAS KOMUNIKASI DAN INFORMATIKA'=>'DINAS KOMUNIKASI DAN INFORMATIKA',
                                        'DINAS KOPERASI USAHA KECIL DAN MENENGAH DAN PERDAGANGAN'=>'DINAS KOPERASI USAHA KECIL DAN MENENGAH DAN PERDAGANGAN',
                                        'DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN'=>'DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN',
                                        'DINAS PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK SERTA PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA'=>'DINAS PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK SERTA PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA',
                                        'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU'=>'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU',
                                        'DINAS PENDIDIKAN'=>'DINAS PENDIDIKAN',
                                        'DINAS PERINDUSTRIAN DAN TENAGA KERJA'=>'DINAS PERINDUSTRIAN DAN TENAGA KERJA',
                                        'DINAS SOSIAL'=>'DINAS SOSIAL',
                                        'INSPEKTORAT'=>'INSPEKTORAT',
                                        'KECAMATAN ASEMROWO'=>'KECAMATAN ASEMROWO',
                                        'KECAMATAN BENOWO'=>'KECAMATAN BENOWO',
                                        'KECAMATAN BUBUTAN'=>'KECAMATAN BUBUTAN',
                                        'KECAMATAN BULAK'=>'KECAMATAN BULAK',
                                        'KECAMATAN DUKUH PAKIS'=>'KECAMATAN DUKUH PAKIS',
                                        'KECAMATAN GAYUNGAN'=>'KECAMATAN GAYUNGAN',
                                        'KECAMATAN GENTENG'=>'KECAMATAN GENTENG',
                                        'KECAMATAN JAMBANGAN'=>'KECAMATAN JAMBANGAN',
                                        'KECAMATAN KARANGPILANG'=>'KECAMATAN KARANGPILANG',
                                        'KECAMATAN KENJERAN'=>'KECAMATAN KENJERAN',
                                        'KECAMATAN LAKARSANTRI'=>'KECAMATAN LAKARSANTRI',
                                        'KECAMATAN MULYOREJO'=>'KECAMATAN MULYOREJO',
                                        'KECAMATAN PABEAN CANTIAN'=>'KECAMATAN PABEAN CANTIAN',
                                        'KECAMATAN PAKAL'=>'KECAMATAN PAKAL',
                                        'KECAMATAN RUNGKUT'=>'KECAMATAN RUNGKUT',
                                        'KECAMATAN SAWAHAN'=>'KECAMATAN SAWAHAN',
                                        'KECAMATAN SUKOLILO'=>'KECAMATAN SUKOLILO',
                                        'KECAMATAN SUKOMANUNGGAL'=>'KECAMATAN SUKOMANUNGGAL',
                                        'KECAMATAN TAMBAKSARI'=>'KECAMATAN TAMBAKSARI',
                                        'KECAMATAN TANDES'=>'KECAMATAN TANDES',
                                        'KECAMATAN TEGALSARI'=>'KECAMATAN TEGALSARI',
                                        'KECAMATAN TENGGILIS MEJOYO'=>'KECAMATAN TENGGILIS MEJOYO',
                                        'KECAMATAN WIYUNG'=>'KECAMATAN WIYUNG',
                                        'KECAMATAN WONOCOLO'=>'KECAMATAN WONOCOLO',
                                        'KECAMATAN WONOKROMO'=>'KECAMATAN WONOKROMO',
                                        'RSUD BHAKTI DHARMA HUSADA'=>'RSUD BHAKTI DHARMA HUSADA',
                                        'RSUD DR. MOHAMAD SOEWANDIE'=>'RSUD DR. MOHAMAD SOEWANDIE',
                                        'SEKRETARIAT DAERAH'=>'SEKRETARIAT DAERAH',
                                    ])
                                    ->native(false)
                                    ->searchable(),
                                    Forms\Components\Select::make('lokasi')
                                    ->disabledOn('edit')
                                    ->required()
                                    ->native(false)
                                    ->searchable()
                                    ->options([
                                        'Kantor Badan Kepegawaian dan Pengembangan Sumber Daya Manusia'=>'Kantor Badan Kepegawaian dan Pengembangan Sumber Daya Manusia',
                                        'Kantor Badan Kesatuan Bangsa dan Politik'=>'Kantor Badan Kesatuan Bangsa dan Politik',
                                        'KANTOR Badan Penanggulangan Bencana Daerah'=>'KANTOR Badan Penanggulangan Bencana Daerah',
                                        'Kantor Badan Pendapatan Daerah'=>'Kantor Badan Pendapatan Daerah',
                                        'Kantor BADAN PERENCANAAN PEMBANGUNAN DAERAH, PENELITIAN DAN PENGEMBANGAN'=>'Kantor BADAN PERENCANAAN PEMBANGUNAN DAERAH, PENELITIAN DAN PENGEMBANGAN',
                                        'Kantor Dinas Kesehatan Kota Surabaya'=>'Kantor Dinas Kesehatan Kota Surabaya',
                                        'GUDANG FARMASI DINAS KESEHATAN KOTA SURABAYA'=>'GUDANG FARMASI DINAS KESEHATAN KOTA SURABAYA',
                                        'Kantor Puskesmas Dupak'=>'Kantor Puskesmas Dupak',
                                        'Kantor DINAS KETAHANAN PANGAN DAN PERTANIAN'=>'Kantor DINAS KETAHANAN PANGAN DAN PERTANIAN',
                                        'EKS. KANTOR DINAS KEBERSIHAN DAN RUANG TERBUKA HIJAU'=>'EKS. KANTOR DINAS KEBERSIHAN DAN RUANG TERBUKA HIJAU',
                                        'Kantor Dinas Lingkungan Hidup'=>'Kantor Dinas Lingkungan Hidup',
                                        'Kantor Dinas Perhubungan Kota Surabaya'=>'Kantor Dinas Perhubungan Kota Surabaya',
                                        'Kantor DINAS PERPUSTAKAAN DAN KEARSIPAN di Dukuh Kupang Barat'=>'Kantor DINAS PERPUSTAKAAN DAN KEARSIPAN di Dukuh Kupang Barat',
                                        'Kantor DINAS PERPUSTAKAAN DAN KEARSIPAN di Rungkut Asri Tengah'=>'Kantor DINAS PERPUSTAKAAN DAN KEARSIPAN di Rungkut Asri Tengah',
                                        'Kantor DINAS PERUMAHAN RAKYAT DAN KAWASAN PERMUKIMAN SERTA PERTANAHAN'=>'Kantor DINAS PERUMAHAN RAKYAT DAN KAWASAN PERMUKIMAN SERTA PERTANAHAN',
                                        'Kantor DINAS SUMBER DAYA AIR DAN BINA MARGA'=>'Kantor DINAS SUMBER DAYA AIR DAN BINA MARGA',
                                        'Kantor Kecamatan Gubeng'=>'Kantor Kecamatan Gubeng',
                                        'Kantor Kecamatan Gunung Anyar'=>'Kantor Kecamatan Gunung Anyar',
                                        'Kantor Kecamatan Krembangan'=>'Kantor Kecamatan Krembangan',
                                        'Kantor Kecamatan Sambikerep'=>'Kantor Kecamatan Sambikerep',
                                        'Kantor Kecamatan Semampir'=>'Kantor Kecamatan Semampir',
                                        'Kantor Kecamatan Simokerto'=>'Kantor Kecamatan Simokerto',
                                        'Kantor Satuan Polisi Pamong Praja'=>'Kantor Satuan Polisi Pamong Praja',
                                        'Kantor Sekretariat DPRD Kota Surabaya'=>'Kantor Sekretariat DPRD Kota Surabaya',
                                        'EKS. KANTOR DINAS PENGELOLAAN BANGUNAN DAN TANAH'=>'EKS. KANTOR DINAS PENGELOLAAN BANGUNAN DAN TANAH',
                                        'Kantor Badan Pengelolaan Keuangan dan Aset Daerah'=>'Kantor Badan Pengelolaan Keuangan dan Aset Daerah',
                                        'BMD PADA PENGELOLA'=>'BMD PADA PENGELOLA',
                                        'EKS. Kantor Dinas Pemuda dan Olah Raga'=>'EKS. Kantor Dinas Pemuda dan Olah Raga',
                                        'Kantor DINAS KEBUDAYAAN, KEPEMUDAAN DAN OLAH RAGA SERTA PARIWISATA'=>'Kantor DINAS KEBUDAYAAN, KEPEMUDAAN DAN OLAH RAGA SERTA PARIWISATA',
                                        'Kantor UPTD Balai Pemuda dan GNI'=>'Kantor UPTD Balai Pemuda dan GNI',
                                        'Kantor UPTD Taman Hiburan Pantai Kenjeran'=>'Kantor UPTD Taman Hiburan Pantai Kenjeran',
                                        'Kantor Dinas Kependudukan dan Catatan Sipil'=>'Kantor Dinas Kependudukan dan Catatan Sipil',
                                        'Kantor Dinas Komunikasi dan Informatika'=>'Kantor Dinas Komunikasi dan Informatika',
                                        'KANTOR Dinas Koperasi Usaha Kecil dan Menengah dan Perdagangan'=>'KANTOR Dinas Koperasi Usaha Kecil dan Menengah dan Perdagangan',
                                        'EKS. Kantor Dinas Perdagangan'=>'EKS. Kantor Dinas Perdagangan',
                                        'Kantor Induk DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN '=>'Kantor Induk DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN ',
                                        'Kantor Dinas Pemberdayaan Perempuan dan Perlindungan Anak serta Pengendalian Penduduk dan Keluarga Berencana'=>'Kantor Dinas Pemberdayaan Perempuan dan Perlindungan Anak serta Pengendalian Penduduk dan Keluarga Berencana',
                                        'Kantor Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu'=>'Kantor Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu',
                                        'Kantor Dinas Pendidikan'=>'Kantor Dinas Pendidikan',
                                        'Kantor Dinas Perindustrian dan Tenaga Kerja'=>'Kantor Dinas Perindustrian dan Tenaga Kerja',
                                        'Kantor Dinas Sosial'=>'Kantor Dinas Sosial',
                                        'UPTD PONSOS KALIJUDAN'=>'UPTD PONSOS KALIJUDAN',
                                        'Kantor Inspektorat Kota Surabaya'=>'Kantor Inspektorat Kota Surabaya',
                                        'KANTOR KECAMATAN ASEMROWO'=>'KANTOR KECAMATAN ASEMROWO',
                                        'Kantor Kecamatan Benowo'=>'Kantor Kecamatan Benowo',
                                        'Kantor Kecamatan Bubutan'=>'Kantor Kecamatan Bubutan',
                                        'Kantor Kecamatan Bulak'=>'Kantor Kecamatan Bulak',
                                        'Kantor Kelurahan Pradah Kalikendal'=>'Kantor Kelurahan Pradah Kalikendal',
                                        'Kantor Kecamatan Dukuh Pakis'=>'Kantor Kecamatan Dukuh Pakis',
                                        'Kantor Kelurahan Dukuh Pakis'=>'Kantor Kelurahan Dukuh Pakis',
                                        'Kantor Kecamatan Gayungan'=>'Kantor Kecamatan Gayungan',
                                        'Kantor Kecamatan Genteng'=>'Kantor Kecamatan Genteng',
                                        'Kantor Kecamatan Jambangan'=>'Kantor Kecamatan Jambangan',
                                        'Kantor Kelurahan Kebraon'=>'Kantor Kelurahan Kebraon',
                                        'Kantor Kelurahan Kedurus'=>'Kantor Kelurahan Kedurus',
                                        'Kantor Kecamatan Karangpilang'=>'Kantor Kecamatan Karangpilang',
                                        'Kantor Kelurahan Waru Gunung'=>'Kantor Kelurahan Waru Gunung',
                                        'Kantor Kelurahan Karang Pilang'=>'Kantor Kelurahan Karang Pilang',
                                        'Kantor Kecamatan Kenjeran'=>'Kantor Kecamatan Kenjeran',
                                        'Kantor Kecamatan Lakarsantri'=>'Kantor Kecamatan Lakarsantri',
                                        'Kantor Kecamatan Mulyorejo'=>'Kantor Kecamatan Mulyorejo',
                                        'Kantor Kecamatan Pabean Cantian'=>'Kantor Kecamatan Pabean Cantian',
                                        'Kantor Kecamatan Pakal'=>'Kantor Kecamatan Pakal',
                                        'Kantor Kecamatan Rungkut'=>'Kantor Kecamatan Rungkut',
                                        'Kantor Kecamatan Sawahan'=>'Kantor Kecamatan Sawahan',
                                        'Kantor Kecamatan Sukolilo'=>'Kantor Kecamatan Sukolilo',
                                        'Kantor Kecamatan Sukomanunggal'=>'Kantor Kecamatan Sukomanunggal',
                                        'Kantor Kecamatan Tambaksari'=>'Kantor Kecamatan Tambaksari',
                                        'Kantor Kecamatan Tandes'=>'Kantor Kecamatan Tandes',
                                        'Kantor Kecamatan Tegalsari'=>'Kantor Kecamatan Tegalsari',
                                        'Kantor Kecamatan Tenggilis Mejoyo'=>'Kantor Kecamatan Tenggilis Mejoyo',
                                        'Kantor Kecamatan Wiyung'=>'Kantor Kecamatan Wiyung',
                                        'Kantor Kecamatan Wonocolo'=>'Kantor Kecamatan Wonocolo',
                                        'Kantor Kecamatan Wonokromo'=>'Kantor Kecamatan Wonokromo',
                                        'Kantor Rumah Sakit Bhakti Dharma Husada'=>'Kantor Rumah Sakit Bhakti Dharma Husada',
                                        'Kantor RSUD dr. Mohamad Soewandhie'=>'Kantor RSUD dr. Mohamad Soewandhie',
                                        'Kantor Bagian Umum, Protokol dan Komunikasi Pimpinan'=>'Kantor Bagian Umum, Protokol dan Komunikasi Pimpinan',
                                        'EKS. Kantor BAGIAN ADMINISTRASI KERJASAMA'=>'EKS. Kantor BAGIAN ADMINISTRASI KERJASAMA',
                                        'EKS. Kantor BAGIAN ADMINISTRASI KESEJAHTERAAN RAKYAT'=>'EKS. Kantor BAGIAN ADMINISTRASI KESEJAHTERAAN RAKYAT',
                                        'Kantor BAGIAN ADMINISTRASI PEMBANGUNAN'=>'Kantor BAGIAN ADMINISTRASI PEMBANGUNAN',
                                        'Kantor BAGIAN ADMINISTRASI PEMERINTAHAN DAN OTONOMI DAERAH'=>'Kantor BAGIAN ADMINISTRASI PEMERINTAHAN DAN OTONOMI DAERAH',
                                        'Kantor Bagian Hukum'=>'Kantor Bagian Hukum',
                                        'Kantor BAGIAN ADMINISTRASI PEREKONOMIAN DAN USAHA DAERAH'=>'Kantor BAGIAN ADMINISTRASI PEREKONOMIAN DAN USAHA DAERAH',
                                        'Kantor BAGIAN ORGANISASI'=>'Kantor BAGIAN ORGANISASI',
                                    ]),
                                    Forms\Components\Select::make('penyelia')
                                        ->disabledOn('edit')
                                        ->required()
                                        ->native(false)
                                        ->searchable()
                                        ->options(
                                            [
                                                'AGUS SISWO'=>'AGUS SISWO',
                                                'MUHAMMAD ALI FIKRI'=>'MUHAMMAD ALI FIKRI',
                                                'AHMAD ADAM YULIAN'=>'AHMAD ADAM YULIAN',
                                                'ANANG SUNTORO'=>'ANANG SUNTORO',
                                                'RACHMANU ISNAINI'=>'RACHMANU ISNAINI',
                                                'ERLANGGA ADHI CAHYA PUTRA, SE'=>'ERLANGGA ADHI CAHYA PUTRA, SE',
                                                'GUNTUR WIJAYA MUIN, S.E'=>'GUNTUR WIJAYA MUIN, S.E',
                                                'TEDY IRAWAN'=>'TEDY IRAWAN',
                                            ]
                                        ),
                                    Forms\Components\Select::make('sesi')
                                            ->disabledOn('edit')
                                            ->required()
                                            ->native(false)
                                            ->searchable()
                                            ->options([
                                                'Sesi 1' => 'Sesi 1',
                                                'Sesi 2' => 'Sesi 2'
                                            ]),
                                    Forms\Components\TextInput::make('register')
                                            ->disabledOn('edit')
                                            ->required(),
                                    Forms\Components\TextInput::make('deskripsi')
                                            ->disabledOn('edit')
                                            ->required(),
                                    Forms\Components\Select::make('jenis')
                                            ->disabledOn('edit')
                                            ->required()
                                            ->native(false)
                                            ->searchable()
                                            ->options([
                                                'Roda 2' => 'Roda 2',
                                                'Roda 4' => 'Roda 4'
                                            ]),
                                    Forms\Components\TextInput::make('nama')
                                            ->disabledOn('edit')
                                            ->required(),
                                    Forms\Components\TextInput::make('merk')
                                            ->disabledOn('edit')
                                            ->required(),
                                    Forms\Components\TextInput::make('tipe')
                                            ->disabledOn('edit')
                                            ->required(),
                                    Forms\Components\TextInput::make('tahun_pengadaan')
                                            ->disabledOn('edit')
                                            ->required()
                                            ->numeric(),
                                    Forms\Components\Select::make('kondisi')
                                            ->disabledOn('edit')
                                            ->required()
                                            ->native(false)
                                            ->searchable()
                                            ->options([
                                                'B' => 'Baik',
                                                'KB' => 'Kurang Baik',
                                                'RB' => 'Rusak Berat'
                                            ]),
                                    Forms\Components\Select::make('kategori')
                                            ->disabledOn('edit')
                                            ->native(false)
                                            ->searchable()
                                            ->options([
                                                'KENDARAAN OPERASIONAL'=>'KENDARAAN OPERASIONAL',
                                                'PICK UP'=>'PICK UP',
                                                'KENDARAAN OPERASIONAL PEGAWAI'=>'KENDARAAN OPERASIONAL PEGAWAI',
                                                'KENDARAAN PATROLI'=>'KENDARAAN PATROLI',
                                            ]),
                                    Forms\Components\TextInput::make('no_mesin')
                                            ->disabledOn('edit')
                                            ->required(),
                                    Forms\Components\TextInput::make('no_rangka')
                                            ->disabledOn('edit')
                                            ->required(),
                                    Forms\Components\TextInput::make('nopol')
                                            ->disabledOn('edit')
                                            ->required(),
                                    Forms\Components\TextInput::make('nilai_perolehan')
                                            ->disabledOn('edit')
                                            ->required(),
                                        ]),
                            Tab::make('Form Survey')
                                ->columnSpanFull()
                                ->schema([
                                    Forms\Components\Select::make('kondisi_riil')
                                        ->required()
                                        ->hiddenOn('create')
                                        ->native(false)
                                        ->searchable()
                                        ->options([
                                            'B' => 'Baik',
                                            'KB' => 'Kurang Baik',
                                            'RB' => 'Rusak Berat'
                                        ]),
                                Forms\Components\TextInput::make('penanggung_jawab')
                                        ->hiddenOn('create'),
                                Forms\Components\Select::make('jabatan')
                                        ->native(false)
                                        ->options([
                                            'Staff' => 'Staff',
                                            'Kasubag/Ketua Tim' => 'Kasubag/Ketua Tim',
                                            'Kepala Puskesmas' => 'Kepala Puskesmas',
                                            'Kepala UPTD' => 'Kepala UPTD',
                                            'Kepala Bagian' => 'Kepala Bagian',
                                            'Kepala Bidang' => 'Kepala Bidang',
                                            'Sekretaris' => 'Sekretaris'
                                        ])
                                        ->hiddenOn('create'),
                                Forms\Components\TextInput::make('bidang')
                                        ->hiddenOn('create'),
                                Forms\Components\TextInput::make('bbm')
                                        ->numeric()
                                        ->suffix('Liter')
                                        ->hiddenOn('create'),
                                Forms\Components\TextInput::make('pemakaian')
                                        ->numeric()
                                        ->suffix('Jam/Hari')
                                        ->hiddenOn('create'),
                                Forms\Components\TextInput::make('angka_speedometer')
                                        ->numeric()
                                        ->hiddenOn('create'),
                                Forms\Components\FileUpload::make('gambar_speedometer')

                                        ->hiddenOn('create'),
                                Forms\Components\FileUpload::make('gambar_mesin')

                                        ->hiddenOn('create'),
                                Forms\Components\FileUpload::make('gambar_interior')


                                        ->hiddenOn('create'),
                                Forms\Components\FileUpload::make('gambar_eksterior')


                                        ->hiddenOn('create'),
                                Forms\Components\TextInput::make('no_mesin')
                                        ->disabledOn('edit')
                                        ->required(),
                                Forms\Components\TextInput::make('no_rangka')
                                        ->disabledOn('edit')
                                        ->required(),
                                Forms\Components\TextInput::make('nokasin')
                                        ->label('No. Rangka/Mesin Baru')
                                        ->hiddenOn('create'),
                                Forms\Components\FileUpload::make('gambar_nokanosin')


                                        ->hiddenOn('create'),
                                Forms\Components\Toggle::make('is_published')
                                        ->label('Survey Dirilis')
                                ])
                                ->hiddenOn('create')


                    ])
                    ->activeTab(2),
            ])
            ;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('opd')
                    ->searchable()
                    ->wrap()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('lokasi')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('penyelia')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('sesi')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('register')
                    ->searchable()
                    ->wrap()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('jenis')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('merk')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nopol')
                    ->wrap()
                    ->searchable()
                    ->description(function (Kendaraan $record): string {
                        return $record->jenis . ' - ' . $record->register;
                    }),
                Tables\Columns\TextColumn::make('tipe')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tahun_pengadaan')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('kondisi')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('kategori')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('no_mesin')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('no_rangka')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nilai_perolehan')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                ->label('Survey'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKendaraans::route('/'),
            'create' => Pages\CreateKendaraan::route('/create'),
            'view' => Pages\ViewKendaraan::route('/{record}'),
            'edit' => Pages\EditKendaraan::route('/{record}/edit'),
        ];
    }
}
