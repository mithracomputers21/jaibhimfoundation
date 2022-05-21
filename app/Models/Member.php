<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Member extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;

    public const STATUS_SELECT = [
        'approved' => 'Approved',
        'rejected' => 'Rejected',
        'hold'     => 'Hold',
    ];

    public const CATEGORY_SELECT = [
        'jaibhim20'  => 'ஜெய் பீம் 2.0',
        'individual' => 'தனி நபர்',
    ];

    public const TYPE_SELECT = [
        'single_payment'    => 'ஒரே தவணை',
        'three_installment' => 'மூன்று தவணை',
    ];

    public $table = 'members';

    public $orderable = [
        'id',
        'name',
        'phone',
        'amount',
        'district.name',
        'status',
    ];

    public $filterable = [
        'id',
        'name',
        'phone',
        'amount',
        'district.name',
        'status',
    ];

    protected $appends = [
        'payment_screenshot',
        'photo',
    ];

    protected $dates = [
        'payment_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'category',
        'type',
        'name',
        'email',
        'phone',
        'address',
        'payment',
        'payment_method_id',
        'payment_date',
        'amount',
        'transaction',
        'district_id',
        'block_id',
        'panchayat_id',
        'habitation_id',
        'contact_person_name',
        'contact_person_number',
        'status',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth  = 50;
        $thumbnailHeight = 50;

        $thumbnailPreviewWidth  = 120;
        $thumbnailPreviewHeight = 120;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight)
            ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
    }

    public function getCategoryLabelAttribute($value)
    {
        return static::CATEGORY_SELECT[$this->category] ?? null;
    }

    public function getTypeLabelAttribute($value)
    {
        return static::TYPE_SELECT[$this->type] ?? null;
    }

    public function paymentMethod()
    {
        return $this->belongsTo(Paymentmethod::class);
    }

    public function getPaymentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setPaymentDateAttribute($value)
    {
        $this->attributes['payment_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPaymentScreenshotAttribute()
    {
        return $this->getMedia('member_payment_screenshot')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getPhotoAttribute()
    {
        return $this->getMedia('member_photo')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();
            $media['thumbnail'] = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function panchayat()
    {
        return $this->belongsTo(Panchayat::class);
    }

    public function habitation()
    {
        return $this->belongsTo(Habitation::class);
    }

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_SELECT[$this->status] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
