<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmailSender extends Model
{
    protected $table = 'email_senders';

    protected $fillable = [
        'name',
        'email',
        'smtp_host',
        'smtp_user',
        'smtp_password',
        'company_info_id',
    ];

    public function companyInfo(): BelongsTo
    {
        return $this->belongsTo(CompanyInfo::class);
    }
}
