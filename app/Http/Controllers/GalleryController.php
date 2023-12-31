<?php

namespace App\Http\Controllers;

use App\Helpers\FileUploadLibraryHelper;
use App\Http\Controllers\BaseController;
use App\Http\Requests\GalleryRequest;
use App\Http\Requests\TeamRequest;
use App\Models\Gallery;
use App\Models\MasterSettings\Designation;
use App\Models\StaffMember;
use App\Repositories\CommonRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class GalleryController extends BaseController
{
    protected CommonRepository $model;
    public function __construct(Gallery $model
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
                if ($value->image != null) {
                    FileUploadLibraryHelper::deleteExistingFile($value->image, Gallery::GALLERY_PATH);
                }
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
            $data['page_url'] = 'galleryManagement';
            $data['page_route'] = 'galleryManagement';

            $data['results'] = $this->model->getData($request);
            $data['designations'] = Designation::orderBy('name','ASC')->get();
            $data['page_title'] = 'Gallery Management';
            $data['request'] = $request;
            $data['show_button'] = true;
            $data['filePath'] = Gallery::GALLERY_PATH;
            $data['load_css'] = [
                'plugins/select2/css/select2.css',

            ];
            $data['load_js'] = [
                'plugins/select2/js/select2.full.min.js',
                'js/custom_app.min.js',
                'js/check_data.min.js',
                'js/image_validation.min.js',

            ];

            return view('backend.gallery.index', $data);
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
    public function store(GalleryRequest $request): RedirectResponse
    {
        try {
            $data = $request->all();
            if (! empty($request->file('image'))) {
                $data['image'] = FileUploadLibraryHelper::setFileUploadName($request->image, $request->title);
                $imageSuccess = true;
            }
            $data['created_by'] = userInfo()->id;

            DB::beginTransaction();

            $create = $this->model->create($data);
            DB::commit();
            if($create){
                if (isset($imageSuccess)) {
                    FileUploadLibraryHelper::setFileUploadPath($request->image, $data['image'], Gallery::GALLERY_PATH);
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
    public function bannerImageStatus($id): RedirectResponse
    {
        try {
            $id = (int) $id;
            $value = $this->model->find($id);
            if ($value->is_banner_image == 0) {
                DB::beginTransaction();
                $this->model->bannerImageStatus($value->id, 1);
                DB::commit();
                session()->flash('success', 'Status successfully updated !');
            } elseif ($value->is_banner_image == 1) {
                DB::beginTransaction();
                $this->model->bannerImageStatus($value->id, 0);
                DB::commit();
                session()->flash('success', 'Status successfully updated !');
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
    public function update(GalleryRequest $request, int $id): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $value =  $this->model->find($id);
            if($value){

                $data = $request->all();
                if (! empty($request->file('image'))) {
                    $data['image'] = FileUploadLibraryHelper::setFileUploadName($request->image, $request->title);
                    $imageSuccess = true;
                }
                $data['updated_by'] = userInfo()->id;
                $update = $this->model->update($data, $id);
                if($update){
                    if (isset($imageSuccess)) {
                        FileUploadLibraryHelper::setFileUploadPath($request->image, $data['image'], Gallery::GALLERY_PATH);
                    }
                }
                DB::commit();
            }
            session()->flash('success', Lang::get('message.flash_messages.updateMessage'));

            return back();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            Session::flash('server_error', Lang::get('message.commons.technicalError'));

            return back();
        }
    }
}
