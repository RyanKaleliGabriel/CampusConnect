<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class Mpesa extends Model
{
    use SoftDeletes, HasFactory ;

    /**
     * stop the autoincrement
     */
    public $incrementing = false;

    /**
     * type of auto-increment
     *
     * @string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference_number',
        'transaction_number',
        'phone_number',
        'amount',
        'description',
        'payload',
        'attempts',
        'is_paid',
        'is_withdrawn',
        'is_initiated',
        'is_successful',
        'queued_at',
        'callback_received_at',
    ];

    /**
     * create casts
     */
    protected $casts = [
        'payload' => 'array'
    ];

}
