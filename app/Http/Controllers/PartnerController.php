<?php

namespace App\Http\Controllers;

use App\Helpers\FileUploadLibraryHelper;
use App\Models\Partner;
use App\Models\PartnerType;
use App\Repositories\CommonRepository;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class PartnerController extends BaseController
{
    protected CommonRepository $model;

    private int $fileHeight = 128;

    private int $fileWidth = 128;
    public function __construct(Partner $model
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
            $data['page_url'] = 'partners';
            $data['page_route'] = 'partners';

            $data['results'] = $this->model->getData($request);
            $data['page_title'] = 'Program Management';
            $data['request'] = $request;
            $data['show_button'] = true;
            $data['filePath'] = Partner::PARTNER_ICON_PATH;
            $data['is_date_search'] = true;
            $data['load_css'] = [
                'plugins/datepicker/english/english-datepicker.css',

            ];
            $data['load_js'] = [
                'plugins/input-mask/jquery/inputmask.min.js',
                'plugins/input-mask/jquery/date_extension.min.js',
                'plugins/input-mask/jquery/extension.min.js',
                'plugins/datepicker/english/english-datepicker.min.js',
                'js/custom_search.js',
            ];
            $data['partnerTypes']=PartnerType::all();

            return view('backend.partner.index', $data);
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
    public function store(Request $request): RedirectResponse
    {
        try {
            $data = $request->all();
            if (! empty($request->file('icon_image'))) {
                $data['icon_image'] = FileUploadLibraryHelper::setFileUploadName(
                    $request->icon_image,
                    $request->name
                );
                $imageSuccess = true;
            }
            $data['created_by'] = userInfo()->id;
            $data['created_date'] =Carbon::now();

            DB::beginTransaction();

            $create = $this->model->create($data);
            DB::commit();
            if($create){
                if (isset($imageSuccess)) {
                    FileUploadLibraryHelper::setFileUploadPath(
                        $request->icon_image,
                        $data['icon_image'],
                        Partner::PARTNER_ICON_PATH
                    );
                }
            }
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
            $value = $this->model->find($id);
            if ($value->status == 0) {
                DB::beginTransaction();
                $this->model->status($value->id, 1);
                DB::commit();
                session()->flash('success', Lang::get('message.flash_messages.statusActiveMessage'));
            } elseif ($value->status == 1) {
                DB::beginTransaction();
                $this->model->status($value->id, 0);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $value =  $this->model->find($id);
            if($value){

                $data = $request->all();
                if (! empty($request->file('icon_image'))) {
                    $data['icon_image'] = FileUploadLibraryHelper::setFileUploadName(
                        $request->icon_image,
                        $request->name
                    );
                    $imageSuccess = true;
                }
                $data['updated_by'] = userInfo()->id;
                $update = $this->model->update($data, $id);
                if($update){
                    if (isset($imageSuccess)) {
                        FileUploadLibraryHelper::setFileUploadPath(
                            $request->icon_image,
                            $data['icon_image'],
                            Partner::PARTNER_ICON_PATH);
                    }
                }
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
