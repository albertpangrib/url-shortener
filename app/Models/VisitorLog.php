<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    use HasFactory;
    protected $table = 'visitor_logs';
    protected $fillable = [
        'ip_address',
        'country',
        'city',
        'url_uid',
    ];

    public function url()
    {
        return $this->belongsTo(Url::class, 'url_uid', 'uid');
    }
}
