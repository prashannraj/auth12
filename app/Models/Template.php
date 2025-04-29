<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Template extends Model
{
    protected $table = 'templates';

    protected $fillable = [
        'company_info_id',
        'template_name',
        'template_type',
        'template_content',
        'is_active',
    ];

    public function companyInfo(): BelongsTo
    {
        return $this->belongsTo(CompanyInfo::class);
    }
}
