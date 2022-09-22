<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ParticipateHistory;
use App\Models\EventHistory;
use Illuminate\Support\Facades\Hash;
use App\Traits\GetPasswordTrait;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Storage;
use App\Traits\UserTrait;
use App\Models\Event;
use App\Helpers\DataFormat;
use Carbon\Carbon;

class UserController extends Controller
{
    use GetPasswordTrait;
    use UploadImageTrait;
    use UserTrait;
    /**
     * ユーザー一覧ページ
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$users = User::paginate(7);
        $response = $this->userSearch($request->all());

        return view('admin.user.index', [
            'search' => $response['queries'],
            'users' => $response['users'],
        ]);
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     // $users = User::all();
    //     $users = ["aaa", "iii"];

    //     // return view('admin.user.index');
    //     return view('admin.user.index', [
    //         'request' => $request,
    //         'users' => $users,
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prefecture = config('prefecture.PREFECTURE');
        return view('admin.user.new', [
            'prefecture' => $prefecture,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'last_name'    => 'required',
            'first_name' => 'required',
            'last_name_kana' => 'required',
            'first_name_kana' => 'required',
            'nickname' => 'required',
            'birth_date' => 'required',
            // 'zip_code' => 'required',
            // 'prefecture' => 'required',
            // 'address' => 'required',
            'tel' => 'required',
            'email' => 'required | unique:users',
            'password' => 'required | min:6 | max:32',
            'company_name' => 'required',
        ],
        [
            'last_name.required'    => '姓を入力してください',
            'first_name.required' => '名の入力は必須です',
            'last_name_kana.required' => 'ふりがな（せい）を入力してください',
            'first_name_kana.required' => 'ふりがな（せい）を入力してください',
            'nickname.required' => 'ニックネームを入力してください',
            'nickname.min' => 'ニックネームは20文字以内で入力してください',
            'birth_date.required' => '生年月日を入力してください。',
            'zip_code.required' => '郵便番号を入力してください。',
            'prefecture.required' => '都道府県を入力してください。',
            'address.required' => '市区町村を入力してください。',
            'tel.required' => '電話番号を入力してください。',
            'email.required' => 'Eメールを入力してください。',
            'password.required' => 'パスワードを入力してください。',
            'password.min' => 'パスワードは最低6文字以上で入力してください。',
            'password.max' => 'パスワードは最大32文字以内で入力してください。',
            'company_name.required' => '会社名を入力してください',
        ]);
        $input = $request->all();
        // $input['password'] = $this->storePassword($request->password);
        // $input['photo_path'] = $request->photo_path ? $this->storeImage($request->photo_path, "quiz/image/") : null;

        User::create([
            'last_name' => $request['last_name'],
            'first_name' => $request['first_name'],
            'last_name_kana' => $request['last_name_kana'],
            'first_name_kana' => $request['first_name_kana'],
            'nickname' => $request['nickname'],
            'photo_path' => $request->photo_path ? $this->storeImage($request->photo_path, "quiz/image/") : null,
            'birth_date' => $request['birth_date'],
            'gender' => $request['gender'],
            'zip_code' => $request['zip_code'],
            'prefecture' => $request['prefecture'],
            'address' => $request['address'],
            'small_address' => $request['small_address'],
            'tel' => $request['tel'],
            'tel2' => $request['tel2'],
            'tel3' => $request['tel3'],
            'email' => $request['email'],
            'password' => $this->storePassword($request['password']),
            'company_name' => $request['company_name'],
            'email_verified_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.user.show')
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $prefecture = config('prefecture.PREFECTURE');
        $password =  $this->decrypted('$2y$10$MuOUsquEb/TC9mIAw2LMzu6FcBu18Unn4u..llytvQn3JIeLUNShm');
        return view('admin.user.edit', [
            'user' => $user,
            'prefecture' => $prefecture,
            'password_decrypt' => $password,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'last_name'    => 'required',
            'first_name' => 'required',
            'last_name_kana' => 'required',
            'first_name_kana' => 'required',
            'nickname' => 'required',
            'birth_date' => 'required',
            'zip_code' => 'required',
            'prefecture' => 'required',
            'address' => 'required',
            'tel' => 'required',
        ],
        [
            'last_name.required'    => '姓を入力してください',
            'first_name.required' => '名の入力は必須です',
            'last_name_kana.required' => 'ふりがな（せい）を入力してください',
            'first_name_kana.required' => 'ふりがな（せい）を入力してください',
            'nickname.required' => 'ニックネームを入力してください。',
            'birth_date.required' => '生年月日を入力してください。',
            'zip_code.required' => '郵便番号を入力してください。',
            'prefecture.required' => '都道府県を入力してください。',
            'address.required' => '市区町村を入力してください。',
            'tel.required' => '電話番号を入力してください。',
        ]);

        $input = $request->all();
        if($request->file('photo_path')){
            Storage::disk('s3')->delete($request->photo_path);
            $input['photo_path'] = $this->storeImage($request->photo_path, "quiz/image/");
        }
        if(!empty($request->password)){
            $request->validate([
                'password' => ['required', 'string', 'confirmed', 'min:6', 'regex:/^[a-zA-Z0-9]+$/'],
                'password_confirmation' => ['required_with:password'],
            ], [
                'password' => [
                    'min' => 'パスワードは:min文字以上でなければなりません',
                    'confirmed' => 'パスワードとパスワード確認は一致させる必要',
                ],
                'password.min' => 'パスワードは:min文字以上でなければなりません',
                'password.confirmed' => 'パスワードとパスワード確認は一致させる必要',
                'password_confirmation.required_with' => 'パスワードを指定する場合は、パスワードの確認も入力してください。',
                'password_confirmation.confirmed' => 'パスワードの確認が一致しません。',
                'password_confirmation.min' => 'パスワードの確認は6文字以上であること',
            ]);

            // $hasPassword = $this->storePassword($request->password);
        }

        if($request->file('photo_path'))
        {
            $updateParam = [
                'employee_type' => $request['employee_type'],
                'last_name' => $request['last_name'],
                'first_name' => $request['first_name'],
                'last_name_kana' => $request['last_name_kana'],
                'first_name_kana' => $request['first_name_kana'],
                'birth_date' => $request['birth_date'],
                'tel' => $request['tel'],
                'tel2' => $request['tel2'],
                'tel3' => $request['tel3'],
                'email' => $request['email'],
                'photo_path' => $input['photo_path'],
                'zip_code' => $request['zip_code'],
                'address' => $request['address'],
                'small_address' => $request['small_address'],
                'prefecture' => $request['prefecture'],
                'company_name' => $request['company_name'],
                'nickname' => $request['nickname'],
            ];
        }else
        {
            $updateParam = [
                'employee_type' => $request['employee_type'],
                'last_name' => $request['last_name'],
                'first_name' => $request['first_name'],
                'last_name_kana' => $request['last_name_kana'],
                'first_name_kana' => $request['first_name_kana'],
                'birth_date' => $request['birth_date'],
                'tel' => $request['tel'],
                'tel2' => $request['tel2'],
                'tel3' => $request['tel3'],
                'email' => $request['email'],
                'zip_code' => $request['zip_code'],
                'address' => $request['address'],
                'small_address' => $request['small_address'],
                'prefecture' => $request['prefecture'],
                'company_name' => $request['company_name'],
                'nickname' => $request['nickname'],
            ];
        }

        if(isset($request->password)){
            $updateParam['password'] = $this->storePassword($request->password);
        }

        $result = User::find($id)->update($updateParam);

        return redirect()->route('admin.user.index');
    }

    public function delete(Request $request, $id) {

        User::where('id', $id)->forceDelete();

        $users = User::paginate(13);

        return view('admin.user.index', [
            'request' => $request,
            'users' => $users,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function createdQuiz(Request $request, User $user)
    {
        //Get Filtered Quizzes and search values
        // $response = $this->quizSearch($request->all(), 1);
        $response['quizzes'] = $user->quizzes()->paginate(13);

        $events = Event::all();

        $helper = new DataFormat;

        return view('admin.user.quizzes', [
            'request' => $request,
            'events' => $events,
            'user' => $user,
            'helper' => $helper,
            'quizzes' => $response['quizzes'],
            // 'search' => $response['queries'],
        ]);
    }
}
