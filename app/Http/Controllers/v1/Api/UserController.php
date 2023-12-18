<?php

    namespace App\Http\Controllers\v1\Api;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\user\ChangePasswordRequest;
    use App\Http\Requests\user\forgetPasswordRequest;
    use App\Http\Requests\user\resetPasswordRequest;
    use App\Http\Requests\user\UpdateProfile;
    use App\Http\Traits\ApiTrait;
    use App\Models\User;
    use App\Notifications\ResetPasswordVerificationNotification;
    use App\Services\FCMService;
    use DateTime;
    use GeoIp2\Record\Location;
    use Ichtrojan\Otp\Otp;
    use Illuminate\Http\Request;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use Session;

    class UserController extends Controller
    {
        use ApiTrait;

        public function login(Request $request)
        {

            if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
                $user = Auth::user();
                $user->fcm_token = $request->fcm_token;
                $success['token'] = $user->createToken($user->name)->plainTextToken;
                $success['name'] = $user->name;
                $user->save();
                return $this->ApiResponse(200, 'login successfully.', '', $success);

            } else {
                return $this->ApiResponse(401, 'Unauthorized.', ['error' => 'Unauthorized'], '');
            }
        }


        public function register(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',
                'phone' => 'required|unique:users',
                'fcm_token'=>'required|unique:users',
            ]);

            if ($validator->fails()) {
                return $this->ApiResponse(403, 'Validation Error.', $validator->errors());

            }

            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);
            $success['token'] = $user->createToken($user->name)->plainTextToken;
            $success['name'] = $user->name;
            $user->save();
            return $this->ApiResponse(200, 'registered successfully', null, $success);
        }

        public function editProfile()
        {
            $user = User::where('id', Auth::user()->id)->first();
            return $this->ApiResponse(200, 'success', null, array('user' => $user));
        }

        public function updateProfile(UpdateProfile $request)
        {
            $user = User::where('id', Auth::user()->id)->first();
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'image' => $request->image,
                'DateOfBirth' => DateTime::createFromFormat('d/m/Y', $request->dateOfBirth),
            ]);



            return $this->ApiResponse(200, 'success', null, array('user' => $user));
        }


        public function ForgetPassword(forgetPasswordRequest $request)
        {

            $email = $request->only('email');
            $user = User::where('email', $email)->first();
            $user->notify(new ResetPasswordVerificationNotification());
            return $this->ApiResponse(200, 'success', null, __('api.sendOtpToMail'));
        }

        public function ResetPassword(resetPasswordRequest $request)
        {
            $otp = new Otp;
            $otp2 = $otp->validate($request->email, $request->otp);
            if (!$otp2->status) {
                return $this->ApiResponse(401, 'error', ['error' => $otp2]);
            }
            $user = User::where('email', $request->email)->first();
            $user->update([
                'password' => Hash::make($request->password),
            ]);
//		$user->tokens()->delete();
            return $this->ApiResponse(200, 'success', null, __('api.changePassword'));
        }

        public function ChangePassword(ChangePasswordRequest $request)
        {
            $user = User::where('phone', $request->phone)->first();
            if (isset($user)) {
                if (Hash::check($request->old_password, $user->password)) {
                    $user->update([
                        'password' => hash::make($request->new_password)
                    ]);
                }
                //			$user->tokens()->delete();
                return $this->ApiResponse(200, 'success', null, 'password changed successfully');
            }

            return $this->ApiResponse(401, 'fail', 'account not found', null);


        }

        public function deleteAccount(Request $request)
        {
            $user = User::where('id', Auth::user()->id)->first();
            if (Hash::check($request->password, $user->password)) {
                $user->delete();
                return $this->ApiResponse(200, 'success', null, 'account deleted successfully');
            }


            return $this->ApiResponse(401, 'error', 'wrong password');

        }

        private function CURLCalling($data): int
        {

            $dataString = json_encode($data);
            $headers = [
                'Authorization: key=' . config('app.fcm_server_key'),
                'Content-Type: application/json',
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

            $response = curl_exec($ch);
            curl_close($ch);
            if ($response === false) {
                $result = 0;
            } else {
                $result = 1;
                return $result;
            }
        }

        public function sendfcm(Request $request)
        {


            $body = [
                'title' =>$request->title,
                'body' => $request->body,
                'created_at' => (string)Carbon::now(),
            ];
            $data = [
                'registration_ids' => array(User::select('fcm_token')->where('id', Auth::user()->id)->first()),
                'data' => $body,
                'notification' => $body,
            ];
            $result = $this->CURLCalling($data);
            return $this->ApiResponse(200, 'success', null, $result);
        }



        public function sendNotificationrToUser()
        {
            $id = Auth::user()->id;
            $user = User::findOrFail($id);

            FCMService::send(
                $user->fcm_token,
                [
                    'title' => 'your title',
                    'body' => 'your body',
                ]
            );


        }

    }
