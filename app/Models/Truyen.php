<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'tentruyen',
        'tomtat',
        'danhmuc_id',
        'theloai_id',
        'hinhanh',
        'slug_truyen',
        'kichhoat',
        'trangthai',
        'tacgia'
    ];
    protected $primaryKey = 'id';
    protected $table = 'truyen';
    public function danhmuctruyen()
    {
        return $this->belongsTo(DanhMucTruyen::class, 'danhmuc_id', 'id');
    }
    public function theloai()
    {
        return $this->belongsTo(TheLoai::class, 'theloai_id', 'id');
    }
    public function chapter()
    {
        return $this->hasMany(Chapter::class, 'truyen_id', 'id');
    }
}