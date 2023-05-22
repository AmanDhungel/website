<?php

namespace App\Http\Controllers;

use App\Helpers\FileUploadLibraryHelper;
use App\Models\Announcement;
use App\Models\AnnouncementType;
use App\Models\HeaderMenu;
use App\Models\Page;
use App\Models\PartnerType;
use App\Models\ProgramType;
use App\Models\PublicationType;
use App\Repositories\CommonRepository;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class HeaderMenuController extends BaseController
{
    protected CommonRepository $model;

    public function __construct(HeaderMenu $model
    )
    {
        parent::__construct();
        // set the model
        $this->model = new CommonRepository($model);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        try {
            $data['page_url'] = 'headermenu';
            $data['page_route'] = 'headermenu';

            $data['results'] = $this->model->getHeaderMenus();
            $data['page_title'] = 'Header Menu Manager';
            $data['request'] = $request;
            $data['show_button'] = true;
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
            $data['commonRepo']=$this->model;
            $data['menuTypes'] = ['page' => 'Page', 'module' => 'Module', 'url' => 'Outer Link'];
            $data['pages'] = Page::query()->where('status', '1')->get();
            $data['programTypes'] = ProgramType::all();
            $data['publicationTypes'] = PublicationType::all();
            $data['partnerTypes'] = PartnerType::all();
            $data['announcementTypes'] = AnnouncementType::all();
            $data['menus'] = HeaderMenu::query()->where('status', '1')->get();
            $data['moduleMenus'] = ['front/program' => 'Program', 'front/publication' => 'Publication',
                'front/partner' => 'Partner', 'front/announcement' => 'Announcement',
                'front/gallery' => 'Gallery', 'front/contactUs' => 'Contact Us'];

            return view('backend.headerMenu.index', $data);
        } catch (\Exception $e) {
            Session::flash('server_error', Lang::get('message.commons.technicalError'));

            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $data = $request->all();
            if ($data['menu_type'] == 'page') {
                $data['menu_url'] = $request->page_menu_url;
            } elseif ($data['menu_type'] == 'module') {
                if ($data['module_menu_url'] == 'front/program') {
                    $data['menu_url'] = $request->module_menu_url . '/' . $request->program_module_type;
                    $data['module_type_id']=$request->program_module_type;
                } elseif ($data['module_menu_url'] == 'front/publication') {
                    $data['menu_url'] = $request->module_menu_url . '/' . $request->publication_module_type;
                    $data['module_type_id']=$request->publication_module_type;
                } elseif ($data['module_menu_url'] == 'front/partner') {
                    $data['menu_url'] = $request->module_menu_url . '/' . $request->partner_module_type;
                    $data['module_type_id']=$request->partner_module_type;
                } elseif ($data['module_menu_url'] == 'front/announcement') {
                    $data['menu_url'] = $request->module_menu_url . '/' . $request->announcement_module_type;
                    $data['module_type_id']=$request->announcement_module_type;
                } else {
                    $data['menu_url'] = $request->module_menu_url;
                }
            } else {
                $data['menu_url'] = $request->external_menu_url;
            }
            $data['created_by'] = userInfo()->id;
            $data['created_date'] = Carbon::now();
            DB::beginTransaction();
            $create = $this->model->create($data);
            DB::commit();
            session()->flash('success', Lang::get('message.flash_messages.insertMessage'));
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
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            DB::beginTransaction();
            $value =  $this->model->find($id);
            if($value){
                $data = $request->all();
                $data['updated_by'] = userInfo()->id;
                $update = $this->model->update($data, $id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
}
