<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Roles\RoleRequest;
use App\Models\Roles\Role;
use App\Models\User;
use App\Repositories\CommonRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class RoleController extends BaseController
{
    protected CommonRepository $model;

    protected CommonRepository $childModel;


    public function __construct(Role $role,
        User $childModel,
    ) {
        parent::__construct();
        // set the model
        $this->model = new CommonRepository($role);
        $this->childModel = new CommonRepository($childModel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): RedirectResponse
    {
        try {
            //check foreign key from  users child table
            $user = $this->childModel->checkForeignKey('role_id', $id);

            if ($user < 1) {
                DB::beginTransaction();
                $role = $this->model->find($id);
                $this->model->delete($id);
                DB::commit();
                session()->flash('success', Lang::get('message.flash_messages.deleteMessage'));
            } else {
                session()->flash('warning', Lang::get('message.flash_messages.warningMessage'));
            }

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
            $data['page_url'] = 'roleManagement/roles';
            $data['page_route'] = 'roles';
            $data['load_css'] = [
                'plugins/select2/css/select2.min.css',

            ];
            $data['load_js'] = [
                'plugins/select2/js/select2.full.min.js',
                'js/custom_app.min.js',
                'js/check_data.min.js',
                'js/role.min.js',

            ];

            $data['roleTypes'] = CommonRepository::roleList();
            $data['results'] = $this->model->getRoleData($request);
            $data['page_title'] = 'Roles';
            $data['request'] = $request;

            return view('backend.roleManagement.roles.index', $data);
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
    public function store(RoleRequest $request): RedirectResponse
    {
        try {
            $data = $request->all();
            $data['created_by'] = userInfo()->id;

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

    //update status from user request
    public function status($id): RedirectResponse
    {
        try {
            $id = (int) $id;
            //check foreign key from  users child table
            $user = $this->childModel->checkForeignKey('role_id', $id);
            if ($user < 1) {
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
            } else {
                session()->flash('warning', Lang::get('message.flash_messages.warningMessage'));
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
    public function update(RoleRequest $request, int $id): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $role = $this->model->find($id);
            $data = $request->all();
            $data['updated_by'] = userInfo()->id;
            $this->model->update($data, $id);
            DB::commit();
            session()->flash('success', Lang::get('message.flash_messages.updateMessage'));

            return back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('server_error', Lang::get('message.commons.technicalError'));

            return back();
        }
    }
}
