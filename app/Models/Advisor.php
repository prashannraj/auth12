<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Advisor extends Model
{
    protected $table = 'advisors';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'specialization',
        'company_info_id',
    ];

    public function companyInfo(): BelongsTo
    {
        return $this->belongsTo(CompanyInfo::class);
    }
}
