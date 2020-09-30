<?php

namespace App\Services;

use App\Country;

class CountryService
{
    /**
     * @param string $name
     * @return mixed
     */
    public function getByName($name = '')
    {
        return Country::byName($name)->get();
    }
}
