<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pharmacy extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pharmacy';

    public static function getClosestPharmacy($lat,$lng)
    {
        $result = DB::select(DB::raw('SELECT
                            Name, Address, City, State, Zip,
                            (
                               3959 *
                               acos(cos(radians(:lat)) * 
                               cos(radians(Latitude)) * 
                               cos(radians(Longitude) - 
                               radians(:lng)) + 
                               sin(radians(:lat2)) * 
                               sin(radians(Latitude)))
                            ) AS Miles 
                            FROM pharmacy  
                            ORDER BY Miles ASC LIMIT 0, 1'),array('lat'=> $lat,'lng'=>$lng,'lat2'=>$lat));
        return $result;
    }
}
