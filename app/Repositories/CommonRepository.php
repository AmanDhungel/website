<?php

namespace App\Repositories;

use App\Models\Roles\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CommonRepository
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Get all instances of model
    public function all()
    {
        return $this->model->orderBy('id', 'DESC')->paginate(10);
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        $record = $this->find($id);

        return $record->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        $data = $this->model->findOrFail($id);

        return $data->delete();
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    // Get the associated model
    public function getModel(): Model
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model): static
    {
        $this->model = $model;

        return $this;
    }

    // Eager load database relationships
    public function with($relations): Builder
    {
        return $this->model->with($relations);
    }

    // find the record with the given id
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    //count record form table
    public function getTotalData($column_name = null, $column_value = null)
    {
        $data = $this->model;
        if (! empty($column_name)) {
            $data = $data->where($column_name, $column_value);
        }

        return $data
            ->count();
    }

    /* check foreign key form child table */
    public function checkForeignKey($foreignColumnName, $foreignId)
    {
        return $this->model
            ->where($foreignColumnName, $foreignId)
            ->count();
    }

    /* update  status from user request */
    public function status($id, $status)
    {
        return $this->model->where('id', $id)->update(['status' => $status]);
    }

    public function bannerImageStatus($id, $status)
    {
        return $this->model->where('id', $id)->update(['is_banner_image' => $status]);
    }

    // find last record
    public function findLastRecord($selectColumnName)
    {
        return $this->model->select($selectColumnName)->latest()->limit(1)->first();
    }

    public function getData($request)
    {
        $result = $this->model;
        if ($request->status != null) {
            $result = $result->where('status', $request->status);
        }

        return $result->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function getCmsPageData($request)
    {
        $result = $this->model;
        if ($request->status != null) {
            $result = $result->where('status', $request->status);
        }

        return $result->orderBy('order', 'ASC')
            ->paginate(10);
    }





    public function getFiscalYearData($request)
    {
        $result = $this->model;
        if ($request->status != null) {
            $result = $result->where('status', $request->status);
        }

        return $result->orderBy('id', 'DESC')
            ->paginate(10);
    }

    public function getFyStatus()
    {
        return $this->model
            ->where('status', '1')
            ->get();
    }

    public function getOtpSetting($request)
    {
        $result = $this->model;
        if ($request->status != null) {
            $result = $result->where('status', $request->status);
        }
        if ($request->status != null) {
            $result = $result->where('status', $request->status);
        }

        if ($request->name != null) {
            $result = $result
                ->where('otp_limit', 'LIKE', '%'.$request->name.'%')
                ->orWhere('otp_duration', 'LIKE', '%'.$request->name.'%');
        }

        return $result->orderBy('id', 'DESC')
            ->paginate(10);
    }

    public function getSmsSetting($request)
    {
        $result = $this->model;
        if ($request->status != null) {
            $result = $result->where('status', $request->status);
        }

        if ($request->name != null) {
            $result = $result
                ->where('sms_token', 'LIKE', '%'.$request->name.'%')
                ->orWhere('sms_from', 'LIKE', '%'.$request->name.'%');
        }

        return $result->orderBy('id', 'DESC')
            ->paginate(10);
    }

    public function getMailSetting($request)
    {
        $result = $this->model;
        if ($request->status != null) {
            $result = $result->where('status', $request->status);
        }

        return $result->orderBy('id', 'DESC')
            ->paginate(10);
    }

    public static function getCommonData($request, $result, $school_id = null, $student_id = null, $module = null)
    {
        if ($request->status != null) {
            $result = $result->where('status', $request->status);
        }
        if ($request->mobile_no != null) {
            $result = $result->where('mobile_no', $request->mobile_no);
        }
        if ($request->email != null) {
            $result = $result->where('email', $request->email);
        }

        if ($request->name != null) {
            $result = $result
                ->where('name_en', 'LIKE', '%'.$request->name.'%')
                ->orWhere('name_np', 'LIKE', '%'.$request->name.'%');
        }

        return $result;
    }

    public function getRoleData($request)
    {
        $result = $this->model;
        if ($request->status != null) {
            $result = $result->where('status', $request->status);
        }
        if ($request->name != null) {
            $result = $result
                ->where('name', 'LIKE', '%'.$request->name.'%');
        }

        $result = $this->roleList();

        return $result->orderBy('name', 'ASC')
            ->paginate(10);
    }

    public static function roleList()
    {
        $result = Role::query();
        if (userInfo()->role_id > 1) {

            $result = $result->whereNot('id', 1);
        }

        return $result;
    }

    public static function getCommonCountData($model)
    {
        $result = $model;

        return $result->count();
    }
    public function getNoticeData($request)
    {
        $result = $this->model;
        if ($request->status != null) {
            $result = $result->where('status', $request->status);
        }
        if ($request->title != null) {
            $result = $result
                ->where('title', 'LIKE', '%'.$request->name.'%');
        }

        if ($request->from_date != null && $request->to_date == null) {
            $result = $result
                ->where('published_date', '>=', $request->from_date);
        }

        if ($request->to_date != null && $request->from_date == null) {
            $result = $result
                ->where('published_date', '<=', $request->to_date);
        }

        if ($request->from_date != null && $request->to_date != null) {
            $result = $result
                ->whereBetween('published_date',[$request->from_date,$request->to_date]);
        }

        return $result->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function getEventData($request)
    {
        $result = $this->model;
        if ($request->status != null) {
            $result = $result->where('status', $request->status);
        }
        if ($request->title != null) {
            $result = $result
                ->where('title', 'LIKE', '%'.$request->name.'%');
        }

        if ($request->from_date != null && $request->to_date == null) {
            $result = $result
                ->where('event_date', '>=', $request->from_date);
        }

        if ($request->to_date != null && $request->from_date == null) {
            $result = $result
                ->where('event_date', '<=', $request->to_date);
        }

        if ($request->from_date != null && $request->to_date != null) {
            $result = $result
                ->whereBetween('event_date',[$request->from_date,$request->to_date]);
        }

        return $result->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function getContactMessageList($request)
    {
        $result = $this->model;

        if ($request->from_date != null && $request->to_date == null) {
            $result = $result
                ->where('message_date', '>=', $request->from_date);
        }

        if ($request->to_date != null && $request->from_date == null) {
            $result = $result
                ->where('message_date', '<=', $request->to_date);
        }

        if ($request->from_date != null && $request->to_date != null) {
            $result = $result
                ->whereBetween('message_date',[$request->from_date,$request->to_date]);
        }

        return $result->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function getSubscriberList($request)
    {
        $result = $this->model;

        if ($request->from_date != null && $request->to_date == null) {
            $result = $result
                ->where('subscriber_date', '>=', $request->from_date);
        }

        if ($request->to_date != null && $request->from_date == null) {
            $result = $result
                ->where('subscriber_date', '<=', $request->to_date);
        }

        if ($request->from_date != null && $request->to_date != null) {
            $result = $result
                ->whereBetween('subscriber_date',[$request->from_date,$request->to_date]);
        }

        return $result->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function getPageData($request)
    {
        $result = $this->model;
        if ($request->status != null) {
            $result = $result->where('status', $request->status);
        }
        if ($request->title != null) {
            $result = $result
                ->where('title', 'LIKE', '%'.$request->name.'%');
        }



        return $result->orderBy('id', 'desc')
            ->paginate(10);
    }
}
