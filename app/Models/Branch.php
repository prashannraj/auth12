<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends Model
{
    protected $table = 'branches';

    protected $fillable = [
        'name',
        'address',
        'telephone',
        'email',
        'manager',
        'location', 
        'company_info_id',
    ];

    public function companyInfo(): BelongsTo
    {
        return $this->belongsTo(CompanyInfo::class);
    }
}
