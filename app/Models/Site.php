<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Site extends Model
{
    use BelongsToTenant;

    protected $fillable = ['url', 'friendly_name', 'tenant_id'];

    public function auditResults(): HasMany
    {
        return $this->hasMany(AuditResult::class);
    }
}