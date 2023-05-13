<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\MasterSettings\District;
use App\Models\MasterSettings\LocalBody;
use App\Models\MasterSettings\Province;
use App\Models\MasterSettings\School;
use App\Models\MasterSettings\Ward;
use App\Models\Roles\Role;
use App\Models\School\ClassEnrolledStudent;
use App\Models\School\FyStudentAttendance;
use App\Models\School\Parent\ParentCredential;
use App\Models\School\Student\StudentCredential;
use App\Models\School\StudentAccountStatusLog;
use App\Models\School\Teacher;
use App\Models\School\Teacher\TeacherCredential;
use App\Models\School\TeacherAccountStatusLog;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class CommonController extends Controller
{
    public function check_login_user_name()
    {
        try {
            $login_user_name = Str::lower($_POST['login_user_name']);
            $user_type = Str::lower($_POST['login_user_type']);
            if ($user_type == 'user') {
                $user = User::where('login_user_name', '=', $login_user_name)->count();
            } elseif ($user_type == 'teacher') {
                $user = TeacherCredential::where('login_user_name', '=', $login_user_name)->count();
            } elseif ($user_type == 'student') {
                $user = StudentCredential::where('login_user_name', '=', $login_user_name)->count();
            } elseif ($user_type == 'parent') {
                $user = ParentCredential::where('login_user_name', '=', $login_user_name)->count();
            } else {
                $user = User::where('login_user_name', '=', $login_user_name)->count();
            }
            if ($user > 0) {
                return response()->json([
                    'status' => true,
                    'message' => Lang::get('message.flash_messages.this_user_name_already_exist'),
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => Lang::get('message.commons.technicalError'),
            ], 500);
        }
    }

    public function check_email()
    {
        try {
            $email = Str::lower($_POST['email']);
            $user_type = Str::lower($_POST['login_user_type']);
            if ($user_type == 'user') {
                $user = User::where('email', '=', $email)->count();
            } elseif ($user_type == 'teacher') {
                $user = TeacherCredential::where('email', '=', $email)->count();
            } elseif ($user_type == 'student') {
                $user = StudentCredential::where('email', '=', $email)->count();
            } elseif ($user_type == 'parent') {
                $user = ParentCredential::where('email', '=', $email)->count();
            } else {
                $user = User::where('email', '=', $email)->count();
            }
            if ($user > 0) {
                return response()->json([
                    'status' => true,
                    'message' => Lang::get('message.flash_messages.this_email_address_already_exist'),
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => Lang::get('message.commons.technicalError'),
            ], 500);
        }
    }

    public function check_mobile()
    {
        try {
            $mobile = Str::lower($_POST['mobile']);
            $user_type = Str::lower($_POST['login_user_type']);
            if ($user_type == 'user') {
                $user = User::where('mobile_no', '=', $mobile)->count();
            } elseif ($user_type == 'teacher') {
                $user = TeacherCredential::where('mobile_no', '=', $mobile)->count();
            } elseif ($user_type == 'student') {
                $user = StudentCredential::where('mobile_no', '=', $mobile)->count();
            } elseif ($user_type == 'parent') {
                $user = ParentCredential::where('mobile_no', '=', $mobile)->count();
            } else {
                $user = User::where('mobile_no', '=', $mobile)->count();
            }
            if ($user > 0) {
                return response()->json([
                    'status' => true,
                    'message' => Lang::get('message.flash_messages.this_contact_already_exist'),
                ]);
            }
        } catch (Exception $e) {
            dd($e);

            return response()->json([
                'success' => false,
                'data' => [],
                'message' => Lang::get('message.commons.technicalError'),
            ], 500);
        }
    }

    public function getLevel(): string
    {
        try {
            $name = setName();
            $role_level_id = $_POST['role_level'];
            $levelList = '';
            if ($role_level_id == 1) {
                $levelList = Province::query()->orderBy($name)
                    ->get();
            } elseif ($role_level_id == 2) {
                $levelList = District::query()->orderBy($name)
                    ->get();
            } elseif ($role_level_id == 3) {
                $levelList = LocalBody::query()->orderBy($name)
                    ->get();
            } elseif ($role_level_id == 4) {
                $levelList = Ward::query()->orderBy($name)
                    ->get();
            } elseif ($role_level_id == 5) {
                $levelList = School::query()->orderBy($name)
                    ->get();
            }
            $result = "<option class='f-kalimati' value=''>".trans('message.pages.common.selectRoleLevel').'</option>';
            foreach ($levelList as $value) {
                $result .= "<option class='f-kalimati' value='".$value->code."'>".$value->$name.'</option>';
            }

            return $result;
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => Lang::get('message.commons.technicalError'),
            ], 500);
        }
    }

    public function getRoleListByLevel(): string
    {
        try {
            $name = setName();
            $roleLevelId = $_POST['roleLevel'];
            $clientCode = $_POST['clientCode'];
            $localBodyCode = '';
            if (isset($_POST['localBodyCode'])) {
                $localBodyCode = $_POST['localBodyCode'];
            }
            $roleList = '';
            if ($roleLevelId == 1) {
                $roleList = Role::query()
                    ->where('province_code', $clientCode)
                    ->orWhere('id', 3);
            } elseif ($roleLevelId == 2) {
                $roleList = Role::query()
                    ->where('district_code', $clientCode)
                    ->orWhere('id', 4);
            } elseif ($roleLevelId == 3) {
                $roleList = Role::query()
                    ->where('local_body_code', $clientCode)
                    ->orWhere('id', 5);
            } elseif ($roleLevelId == 4) {
                $roleList = Role::query()
                    ->where('local_body_code', $localBodyCode)
                    ->where('ward_no', $clientCode)
                    ->orWhere('id', 6);
            } elseif ($roleLevelId == 5) {
                $roleList = Role::query()
                    ->where('school_id', $clientCode)
                    ->orWhere('id', 7)
                    ->orWhere('id', 12);
            } elseif ($roleLevelId == 6) {
                $roleList = Role::query()
                    ->where('is_system_admin_role', true)
                    ->whereNot('id', 1);
            }

            $roleList = $roleList->orderBy($name)->get();
            $result = "<option class='f-kalimati' value=''>".trans('message.pages.role_access.select_user_type').'</option>';
            foreach ($roleList as $value) {
                $result .= "<option class='f-kalimati' value='".$value->id."'>".$value->$name.'</option>';
            }

            return $result;
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => Lang::get('message.commons.technicalError'),
            ], 500);
        }
    }

    public function getStudentList(): string
    {
        try {
            $name = setName();
            $school_id = $_POST['school_id'] ?? userInfo()->school_id;
            $class_id = $_POST['class_id'];
            $schoolList = ClassEnrolledStudent::query()
                ->leftJoin('students as s', 's.id', 'class_enrolled_students.student_id')
                ->select('s.id', 's.code', $name.' '.'as name')
                ->where(['fy_id' => currentFy()->id, 'class_enrolled_students.school_id' => $school_id, 'class_id' => $class_id])
                ->orderBy($name)
                ->get();
            $result = "<option class='f-kalimati' value=''>".trans('message.pages.common.select_student').'</option>';
            foreach ($schoolList as $value) {
                $result .= "<option class='f-kalimati' value='".$value->id."'>".$value->name.'</option>';
            }

            return $result;
        } catch (Exception $e) {
            dd($e);

            return response()->json([
                'success' => false,
                'message' => Lang::get('message.commons.technicalError'),
            ], 500);
        }
    }

    public function getTeacherList(): string
    {
        try {
            $name = setName();
            $school_id = $_POST['school_id'];
            $teacherList = Teacher::query()
//                ->where(['school_id' => $school_id, 'status' => true])
                ->orderBy($name)
                ->get();
            $result = "<option class='f-kalimati' value=''>".trans('school.select_teacher').'</option>';
            foreach ($teacherList as $value) {
                $result .= "<option class='f-kalimati' value='".$value->id."'>".$value->$name.'</option>';
            }

            return $result;
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => Lang::get('message.commons.technicalError'),
            ], 500);
        }
    }

    public function getFySubjectList(): string
    {
        try {
            if (isset($_POST['school_id'])) {
                $school_id = $_POST['school_id'];
            } else {
                $school_id = userInfo()->school_id;
            }
            $class_id = $_POST['class_id'];
            $subjectList = FySubject::query()
                ->where(['school_id' => $school_id, 'fy_class_id' => $class_id, 'status' => true])
                ->orderBy('id', 'desc')
                ->get();
            $result = "<option class='f-kalimati' value=''>".trans('school.select_subject').'</option>';
            foreach ($subjectList as $value) {
                $name = getLan() == 'np' ? $value->subject->name_np : $value->subject->name_en;

                $result .= "<option class='f-kalimati' value='".$value->id."'>".$name.'</option>';
            }

            return $result;
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => Lang::get('message.commons.technicalError'),
            ], 500);
        }
    }

    public function getFyStudentList(): string
    {
        try {
            if (isset($_POST['school_id'])) {
                $school_id = $_POST['school_id'];
            } else {
                $school_id = userInfo()->school_id;
            }
            $class_id = $_POST['class_id'];
            $subject_id = $_POST['subject_id'];
            $subjectList = FyStudentAttendance::query()
                ->where(['school_id' => $school_id, 'fy_class_id' => $class_id, 'fy_subject_id' => $subject_id, 'status' => true])
                ->orderBy('id', 'desc')
                ->get();
            $result = "<option class='f-kalimati' value=''>".trans('school.select_student').'</option>';
            foreach ($subjectList as $value) {
                $name = getLan() == 'np' ? $value->student->name_np : $value->student->name_en;

                $result .= "<option class='f-kalimati' value='".$value->id."'>".$name.'</option>';
            }

            return $result;
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => Lang::get('message.commons.technicalError'),
            ], 500);
        }
    }

    public function getEventList(Request $request)
    {
        try {
            if ($request->ajax()) {
                $title = getLan() == 'np' ? 'title_np' : 'title_en';
                $data = Event::whereDate('start_date_en', '>=', $request->start)
                    ->whereDate('end_date_en', '<=', $request->end)
                    ->where(['school_id' => userInfo()->school_id, 'status' => true])
                    ->get(['id', $title.' '.'as title', 'start_date_en as start', 'end_date_en as end']);

                return response()->json($data);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => Lang::get('message.commons.technicalError'),
            ], 500);
        }
    }

    public function getEvent(Request $request): JsonResponse
    {
        try {
            $title = getLan() == 'np' ? 'title_np' : 'title_en';
            $details = getLan() == 'np' ? 'description_np' : 'description_en';
            $start_date = getLan() == 'np' ? 'start_date_np' : 'start_date_en';
            $end_date = getLan() == 'np' ? 'end_date_np' : 'end_date_en';
            $data = Event::query()->where('id', $request->id)->select('id', $title.' '.'as title', $details.' '.'as details', $start_date.' '.'as start_date', $end_date.' '.'as end_date')->first();

            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => 'Data Successfully Fetch !',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'Something went to wrong',
            ], 500);
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function eventAjax(Request $request)
    {
        try {
            switch ($request->type) {
                case 'add':
                    $event = Event::create([
                        'title_en' => $request->title,
                        'start_date_en' => $request->start,
                        'start_date_np' => $this->dateConverter->eng_to_nep($request->start),
                        'end_date_en' => $request->end,
                        'end_date_np' => $this->dateConverter->eng_to_nep($request->end),
                    ]);

                    return response()->json($event);
                    break;

                case 'update':
                    $event = Event::find($request->id)->update([
                        'title' => $request->title,
                        'start_date_en' => $request->start,
                        'start_date_np' => $this->dateConverter->eng_to_nep($request->start),
                        'end_date_en' => $request->end,
                        'end_date_np' => $this->dateConverter->eng_to_nep($request->end),
                    ]);

                    return response()->json($event);
                    break;

                case 'show':
                    $event = Event::find($request->id)->first();

                    return response()->json($event);
                    break;

                case 'delete':
                    $event = Event::find($request->id)->delete();

                    return response()->json($event);
                    break;
                default:
                    // code...
                    break;
            }
        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => 'Something went to wrong',
            ], 500);
        }
    }

    public function getAccountStatusLog(Request $request)
    {
        try {
            $type = Str::lower($_POST['type']);
            $id = $_POST['id'];
            $data = '';
            $name = getLan() == 'np' ? 'full_name_np' : 'full_name';
            $date = getLan() == 'np' ? 'update_date_np' : 'update_date_en';
            $active = trans('message.button.active');
            $inactive = trans('message.button.inactive');
            $userId = userInfo()->id;
            $actionBy = getLan() == 'np' ? 'तपाई' : 'You';
            if ($type == 'teacher') {
                $data = TeacherAccountStatusLog::query()->where('teacher_id', $id)
                    ->leftJoin('users', 'users.id', 'teacher_account_status_logs.updated_by')
                    ->orderBy('teacher_account_status_logs.id', 'desc')
                    ->select('teacher_account_status_logs.created_at', 'users'.'.'.$name.' '.'as name', 'teacher_account_status_logs'.'.'.$date.' '.'as date',
                        DB::raw("(CASE WHEN teacher_account_status_logs.status = 1 THEN '$active' ELSE '$inactive' END) AS status"),
                        DB::raw("(CASE WHEN teacher_account_status_logs.updated_by = '$userId' THEN '$actionBy' ELSE 'name' END) AS actionBy"),
                    )
                    ->get();
                $data[0]->time = Carbon::parse($data[0]->created_at)->diffForHumans();
            } elseif ($type == 'student') {
                $data = StudentAccountStatusLog::query()->where('student_id', $id)
                    ->leftJoin('users', 'users.id', 'student_account_status_logs.updated_by')
                    ->orderBy('student_account_status_logs.id', 'desc')
                    ->select('student_account_status_logs.created_at', 'users'.'.'.$name.' '.'as name', 'student_account_status_logs'.'.'.$date.' '.'as date',
                        DB::raw("(CASE WHEN student_account_status_logs.status = 1 THEN '$active' ELSE '$inactive' END) AS status"),
                        DB::raw("(CASE WHEN student_account_status_logs.updated_by = '$userId' THEN '$actionBy' ELSE 'name' END) AS actionBy"),
                    )
                    ->get();
                $data[0]->time = Carbon::parse($data[0]->created_at)->diffForHumans();
            }

            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => 'Data Successfully Fetch !',
            ], 200);
        } catch (Exception $e) {
            dd($e);

            return response()->json([
                'success' => false,
                'message' => Lang::get('message.commons.technicalError'),
            ], 500);
        }
    }
}
