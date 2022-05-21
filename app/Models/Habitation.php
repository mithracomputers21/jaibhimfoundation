<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Habitation extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'habitations';

    public $orderable = [
        'id',
        'name',
        'panchayat.name',
    ];

    public $filterable = [
        'id',
        'name',
        'panchayat.name',
    ];

    protected $fillable = [
        'name',
        'panchayat_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function panchayat()
    {
        return $this->belongsTo(Panchayat::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
