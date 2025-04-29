<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceFees extends Model
{
    protected $table = 'service_fees';

    protected $fillable = [
        'company_info_id',
        'service_fee',
        'currency',
        'is_active',
    ];

    public function companyInfo(): BelongsTo
    {
        return $this->belongsTo(CompanyInfo::class);
    }
}
