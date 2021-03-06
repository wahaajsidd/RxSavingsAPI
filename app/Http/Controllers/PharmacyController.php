<?php
namespace App\Http\Controllers;

use App\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public static function GetPharmacyByLocation(Request $request)
    {

        try {

            /*
             * Using custom validation as lumen does not support Request Form
             * */
            if(!$request->has('latitude'))
                throw new \Exception('Latitude not provided.', 2001);
            if(!$request->has('longitude'))
                throw new \Exception('Longitude not provided.',2001);

            $latitude = $request->get('latitude');
            $longitude = $request->get('longitude');

            return response()->Json(Pharmacy::getClosestPharmacy($latitude,$longitude));

        }catch (\Exception $exception){
            // Default user friendly error message.
            $errorMessage = 'Ops! something went wrong. We are unable to locate the nearest pharmacies.';

            if($exception->getCode() == 2001)
                $errorMessage = $exception->getMessage();

            return response()->Json($errorMessage);
        }
    }


}
