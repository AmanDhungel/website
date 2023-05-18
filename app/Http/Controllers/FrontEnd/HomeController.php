<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\FrondEndRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    private FrondEndRepository $repository;
    public function __construct(FrondEndRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        try {

            #banner page
            $data['banners'] = $this->repository->getBanners();
            #about us  page
            $data['aboutUs'] = $this->repository->getAboutUs();
            #about us  page
            $data['teams'] = $this->repository->getTeams();
            return view('frontEnd.index',$data);
        } catch (\Exception $e) {
            dd($e);
            Session::flash('server_error', Lang::get('message.commons.technicalError'));

            return back();
        }
    }

}
