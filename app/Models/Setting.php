<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'keywords',
        'description',
        'logo',
        'favicon',
        'company',
        'address',
        'phone',
        'fax',
        'gsm',
        'email',
        'smtp_server',
        'smtp_email',
        'smtp_password',
        'smtp_port',
        'facebook',
        'instagram',
        'linkedin',
        'twitter',
        'pintrest',
        'youtube',
    ];
}
