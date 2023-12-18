<?php

    namespace App\Http\Controllers\v1\Api;

    use App\Http\Controllers\Controller;
    use App\Http\Traits\ApiTrait;
    use App\Models\Carmodel;
    use App\Models\Cartype;
    use App\Models\Country;
    use App\Models\services\bookService;
    use App\Models\services\Service;
    use App\Models\services\Serviceday;
    use Carbon\CarbonInterval;
    use Illuminate\Http\Request;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\Lang;

    class ServiceController extends Controller
    {
        use ApiTrait;

        /**
         * Display a listing of the resource.
         */
        public function index(Request $request)
        {
            $lang = $request->lang;
            $country_id = $request->country_id;
            $services = Service::where('country_id', $country_id)->get();
            $services = json_decode($services, true);
            $services = array_map(function ($item) use ($lang) {
                return [
                    'id' => $item['id'],
                    'name' => $item['name'][$lang],
                    'price' => $item['price'],
                    'oldprice' => $item['oldprice'],
                    'image' => $item['image'],
                    'short_description' => $item['short_description'][$lang],
                    'description' => $item['description'][$lang],
                    'details' => $item['details'][$lang],
                ];
            }, $services);
            return $this->ApiResponse(200, 'Services', null, $services);
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            //
        }

        /**
         * Display the specified resource.
         */
//        public function showTimes(Request $request)
//        {
//            $date = $request->date;
//            if($date >= now()) {
//                $service = Service::find($request->service_id);
//                if ($service) {
//                    // Extract start time, end time, and duration from the Service model
//                    $startTime = Carbon::parse($service->start_time);
//                    $endTime = Carbon::parse($service->end_time);
//
//                    // Parse the duration into hours, minutes, and seconds
//                    list($durationHours, $durationMinutes, $durationSeconds) = sscanf($service->duration, '%d:%d:%d');
//
//                    // Create a CarbonInterval for the duration
//                    $duration = CarbonInterval::hours($durationHours)
//                        ->minutes($durationMinutes)
//                        ->seconds($durationSeconds);
//
//                    // Initialize an array to store the result times
//                    $serviceTimes = [];
//
//                    // Iterate and add duration to start time until it's less than end time
//                    while ($startTime < $endTime) {
//                        $serviceTimes[ $startTime->format('H:i:s')] = 'available'; // Format and add the time
//                        $startTime->add($duration); // Add the duration to the start time
//
//                    }
//                    $booked_services = bookService::select('time')->where('service_id', $request->service_id)->where('date', $date)->get();
//                    foreach ($booked_services as $booked){
//                        $serviceTimes[$booked->time] ='not available';
//                    }
//
//
//                    return $this->ApiResponse(200, 'Services', null, array('date'=>$date, 'serviceTime' => $serviceTimes));
//                }
//
//            }
//        }









        public function showTimes(Request $request)
        {
            $lang = Lang::locale();

            //   $date = $request->date;
            $servicedaies  = Serviceday::with('servicetimes')->where('service_id', $request->service_id)->get();
            $seredaies= json_decode($servicedaies, true);
            $seredaies = array_map(function ($item) use ($lang) {
                return [
                    'id' => $item['id'],
                    'name' => $item['name'][$lang],
                    'servicetimes' => $item['servicetimes'],
                ];
            }, $seredaies);

            return $this->ApiResponse(200, 'Services', null, $seredaies);


        }



        public function prepartion_services(Request $request)
        {
            $lang =  Lang::locale();
            $CarType  =Cartype::get();
            $CarModel  =Carmodel::get();
            $cartype = json_decode($CarType, true);
            $carmodel = json_decode($CarModel, true);


            $cartype = array_map(function ($item) use ($lang) {
                return [
                    'id' => $item['id'],
                    'name' => $item['name'][$lang],
                ];
            }, $cartype);


            $carmodel = array_map(function ($item) use ($lang) {
                return [
                    'id' => $item['id'],
                    'name' => $item['name'][$lang],
                ];
            }, $carmodel);

            $all = ['cartype'=>$cartype,
                'carmodel' => $carmodel,
            ];

            return $this->ApiResponse(200,'Cars List',null, $all);

        }



    }
