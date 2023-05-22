<?php

namespace App\Http\Controllers;

use App\Helpers\FileUploadLibraryHelper;
use App\Http\Controllers\BaseController;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use App\Repositories\CommonRepository;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class PageController extends BaseController
{
    protected CommonRepository $model;
    public function __construct(Page $model
    ) {
        parent::__construct();
        // set the model
        $this->model = new CommonRepository($model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): RedirectResponse
    {
        try {

            $value = $this->model->find($id);
            DB::beginTransaction();
            if($value){
                $this->model->delete($id);
                DB::commit();
            }
            session()->flash('success', Lang::get('message.flash_messages.deleteMessage'));

            return back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('server_error', Lang::get('message.commons.technicalError'));

            return back();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $data['page_url'] = 'pages';
            $data['page_route'] = 'pages';

            $data['results'] = $this->model->getPageData($request);
            $data['page_title'] = 'Page Manager';
            $data['request'] = $request;
            $data['show_button'] = true;

            return view('backend.page.index', $data);
        } catch (\Exception $e) {
            Session::flash('server_error', Lang::get('message.commons.technicalError'));

            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request): RedirectResponse
    {
        try {
            $data = $request->all();

            $data['created_by'] = userInfo()->id;
            $data['created_date'] = Carbon::now()->toDateString();

            DB::beginTransaction();

            $this->model->create($data);
            DB::commit();
            session()->flash('success', Lang::get('message.flash_messages.insertMessage'));

            return back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('server_error', Lang::get('message.commons.technicalError'));

            return back();
        }
    }

    //update status from user request
    public function status($id): RedirectResponse
    {
        try {
            $id = (int) $id;
            $role = $this->model->find($id);
            if ($role->status == 0) {
                DB::beginTransaction();
                $this->model->status($role->id, 1);
                DB::commit();
                session()->flash('success', Lang::get('message.flash_messages.statusActiveMessage'));
            } elseif ($role->status == 1) {
                DB::beginTransaction();
                $this->model->status($role->id, 0);
                DB::commit();
                session()->flash('success', Lang::get('message.flash_messages.statusInactiveMessage'));
            }

            return back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('server_error', Lang::get('message.commons.technicalError'));

            return back();
        }
    }

    public function order($id,Request $request): RedirectResponse
    {
        try {
            $id = (int) $id;
            $value = $this->model->find($id);
            if ($value) {
                DB::beginTransaction();
                $update = $this->model->update($request->all(), $id);
                DB::commit();
                session()->flash('success', Lang::get('message.flash_messages.statusActiveMessage'));
            }

            return back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('server_error', Lang::get('message.commons.technicalError'));

            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, int $id): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $value =  $this->model->find($id);
            if($value){

                $data = $request->all();
                $data['updated_by'] = userInfo()->id;
                $this->model->update($data, $id);
                DB::commit();
            }
            session()->flash('success', Lang::get('message.flash_messages.updateMessage'));

            return back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('server_error', Lang::get('message.commons.technicalError'));

            return back();
        }
    }
}
