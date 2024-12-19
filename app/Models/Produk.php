<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class Produk extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kategori_id',
        'pengarang_id',
        'penerbit_id',
        'stok_id',
        'nama_produk',
        'berat_produk',
        'ukuran_produk',
        'bahasa',
        'isbn',
        'jenis_cover',
        'halaman_produk',
        'keterangan',
        'status',
        'catatan',
        'jenis_isi',
        'created_at',
        'updated_at'
    ];

    public function tapActivity(Activity $activity, string $eventName)
    {
        $activity->description = "{$activity->causer->name} {$eventName} on {$activity->subject->name}";
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['name', 'username', 'email', 'telp', 'is_disabled']);
    }
}
