<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Models\Advisor;
use App\Models\Branch;
use App\Models\EmailSender;
use App\Models\Template;
use App\Models\ServiceFee;


class CompanyInfo extends Model
{
    protected $table = 'company_infos';

    protected $fillable = [
        'name',
        'footnote',
        'address',
        'registration_no',
        'website',
        'logo',
        'stamp',
        'telephone',
        'email',
        'registered_in',
        'regulated_by',
        'regulator_logo',
        'regulation_no',
        'vat',
    ];

    protected $appends = [
        'logo_url',
        'stamp_url',
        'regulation_logo_url',
    ];

    public function getLogoUrlAttribute(): string
    {
        return '/uploads/images/' . ($this->logo ?? 'placeholder.png');
    }

    public function getRegulatorLogoUrlAttribute(): string
    {
        return '/uploads/images/' . ($this->regulator_logo ?? 'placeholder.png');
    }

    public function getStampUrlAttribute(): string
    {
        return '/uploads/images/' . ($this->stamp ?? 'placeholder.png');
    }

                public function advisors()
            {
                return $this->hasMany(Advisor::class);
            }

            public function branches()
            {
                return $this->hasMany(Branch::class);
            }

            public function emailSenders()
            {
                return $this->hasMany(EmailSender::class);
            }

            public function templates()
            {
                return $this->hasMany(Template::class);
            }

            public function serviceFees()
            {
                return $this->hasMany(ServiceFee::class);
            }

}
