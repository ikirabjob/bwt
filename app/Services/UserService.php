<?php

namespace App\Services;

use App\User;
use Illuminate\Database\Eloquent\Builder;

class UserService
{
    public function getUsersByCountryWithCompanies($country_id)
    {
        return User::with(['companies'])->whereHas('companies', function (Builder $query) use ($country_id) {
            $query->where('companies.county_id', $country_id);
        })->get();
    }
}
