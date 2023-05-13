<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\CommonRepository;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected User $user;

    public function __construct(User $user)
    {
        $this->middleware('auth');
        parent::__construct();
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $data['total_user'] = CommonRepository::getCommonCountData($this->user);
            $data['page_title'] = 'Dashboard';

            return view('backend.dashboard', $data);
        } catch (Exception $e) {
            Session::flash('server_error', Lang::get('message.commons.technicalError'));

            return back();
        }
    }
}
