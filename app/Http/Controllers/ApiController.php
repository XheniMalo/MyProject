<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\peopleinfo;

class ApiController extends Controller
{
    public function getDataApi(){
       $response= Http::get('https://jsonplaceholder.typicode.com/users');

        
        if ($response->successful()) {
            $apiData = $response->json();
           
            $dbController = new DBController();
            $dbDataArray = $dbController->getData();

            foreach ($apiData as $userData) {
                foreach ($dbDataArray as $dbUser) {
                    $nameMatch = strtolower($userData['name']) == strtolower($dbUser['name']);
                    $usernameMatch = strtolower($userData['username']) == strtolower($dbUser['username']);
                    $emailMatch = strtolower($userData['email']) == strtolower($dbUser['email']);
                    $phoneMatch = strtolower($userData['phone'] ?? '') == strtolower($dbUser['phone'] ?? '');
                    $formattedAddressApi = strtolower(preg_replace('/[.,\/_\-]/', '', 
                    $userData['address']['street'] . 
                    $userData['address']['suite'] . 
                    $userData['address']['city'] . 
                    $userData['address']['zipcode']
                ));
                    if (is_array($dbUser['address'])) {
                    $dbUserFormattedAddress = strtolower(preg_replace('/[.,\/_\-]/', '', implode('', $dbUser['address'])));
                    } else {
                     $dbUserFormattedAddress = '';
                    }

                    $addressMatch = $formattedAddressApi == $dbUserFormattedAddress;

                    if ($nameMatch && $usernameMatch && $emailMatch && $phoneMatch && $addressMatch) {
                        $dbUser->match_id = $userData['id'];
                        $dbUser->save();
                    }
                }
            }

        }



        
    }
    
    
 }

