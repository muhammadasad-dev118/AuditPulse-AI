<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;

class AuditResult extends Model
{
    use BelongsToTenant;

    protected $fillable = ['health_score', 'meta_data', 'site_id', 'tenant_id'];

    protected $casts = [
        'meta_data' => 'array',
    ];
}