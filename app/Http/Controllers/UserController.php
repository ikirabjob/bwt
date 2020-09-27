<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userService;
    public $countryService;

    public function __construct(UserService $userService, CountryService $countryService)
    {
        $this->userService = $userService;
        $this->countryService = $countryService;
    }

    public function index(){

        $country = "Канада";
        $country_id = $this->countryService->byName($country)->first();
        $users = $this->userService->getUsersByCountryWithCompanies($country_id->id);

//        foreach ($users as $user){
//            echo "<p>";
//            echo "User: " . $user->name. "<br>" . "Companies";
//            foreach ($user->companies as $company){
//                echo "<li>".
//                    $company->name .
//                    " (Start Date " .$company->pivot->start_date. ", End Date " .$company->pivot->end_date. ")" .
//                "</li>";
//            }
//            echo "</p>";
//        }
    }
}
