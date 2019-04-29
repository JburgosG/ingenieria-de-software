<?php

namespace App\Http\Controllers;

use App\User;
use App\Teacher;
use App\Student;
use App\Attendant;
use App\Relationship;
use App\Student_Type;
use App\Levels_education;
use App\Identification_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if (_user()->group->id == 1) {
            $users = User::all();

            $data = [
                'users' => $users
            ];

            return view('modules.users.index', $data);
        }
        return redirect('/');
    }

    /* --------------------------------------------------------------------- */

    public function create() {
        if (_user()->group->id == 1) {
            $data = $this->general_data();
            return view('modules.users.create', $data);
        }
        return redirect('/');
    }

    public function store(Request $request) {
        $user_m = new User();
        $data = array_filter($request->all());

        $user = $this->prepareData($data);
        $group_id = $this->getGroup($data['group_id']);

        $other = [
            'group_id' => $group_id,
            'password' => bcrypt($data['password'])
        ];

        $user_m->fill(array_merge($user, $other));
        if ($user_m->save()) {
            $this->profile($user_m->id, $group_id, $data, false);
        }

        $msg = 'created';
        $state = 'success';
        $web = '/users';

        _notification($state, $msg, 'Usuario');
        return Redirect::To($web)->withInput();
    }

    public function profile($user_id, $group_id, $data, $upd) {
        switch ($group_id) {
            case 2:
                $this->student($user_id, $data, $upd);
                break;
            case 3:
                $this->teacher($user_id, $data, $upd);
                break;
            case 4:
            // Godfather
        }
    }

    public function student($user_id, $data, $upd) {
        if ($upd) {
            $student = Student::find($upd);
        } else {
            $student = new Student;
        }

        $student->eps = $data['eps'];
        $student->user_id = $user_id;
        $student->type_id = $data['type_id'];
        $student->level_education_id = $data['level_education_id'];
        $student->price = isset($data['price']) ? $data['price'] : null;
        $student->payment_day = isset($data['payment_day']) ? $data['payment_day'] : null;
        if ($student->save()) {
            $at = !empty($upd) ? $student->attendant->id : false;
            $this->attendant($student->id, $data, $at);
        }
    }

    public function teacher($user_id, $data, $upd) {
        if ($upd) {
            $teacher = Teacher::find($upd);
        } else {
            $teacher = new Teacher;
        }

        $fields = array(
            'biography' => 'biography', 'specialty' => 'specialty',
            'level_education_id' => 'level_education_teacher'
        );

        foreach ($fields as $key => $row) {
            if (!empty($data[$row])) {
                $info[$key] = $data[$row];
            } else {
                $info[$key] = null;
            }
        }

        $info['user_id'] = $user_id;
        $teacher->fill($info);
        $teacher->save();
    }

    public function attendant($student_id, $data, $upd) {
        $info = array();

        if ($upd) {
            $attendant = Attendant::find($upd);
        } else {
            $attendant = new Attendant;
        }

        $fields = array(
            'name' => 'name_a', 'email' => 'email_a',
            'identification_type_id' => 'identification_type_a',
            'address' => 'address_a', 'cell_phone' => 'cell_phone',
            'home_phone' => 'home_phone', 'office_phone' => 'office_phone',
            'identification' => 'identification_a', 'relationship_id' => 'relationship_id',
        );

        foreach ($fields as $key => $row) {
            if (!empty($data[$row])) {
                $info[$key] = $data[$row];
            } else {
                $info[$key] = null;
            }
        }

        $info['student_id'] = $student_id;
        $attendant->fill($info);
        $attendant->save();
    }

    /* --------------------------------------------------------------------- */

    public function show($base) {
        $id = decrypt($base);
        if ((_user()->group->id == 1 || _user()->id == $id) && !empty($base)) {
            $user = User::find($id);
            if (!empty($user)) {
                return view('modules.users.profile', compact('user'));
            }
        }
        return redirect('/');
    }

    /* --------------------------------------------------------------------- */

    public function edit($id) {
        $user = User::find($id);
        $data = $this->general_data();
        $info = array_merge($data, ['user' => $user]);
        return view('modules.users.edit', $info);
    }

    public function update($id, Request $request) {
        $user_m = User::find($id);
        $data = array_filter($request->all());
        $user = $this->prepareData($data);

        $user_m->fill($user);
        if ($user_m->save()) {
            $profile_id = $this->getId($user_m);
            $this->profile($user_m->id, $user_m->group_id, $data, $profile_id);
        }

        $msg = 'edit';
        $state = 'success';
        $web = '/users';

        _notification($state, $msg, 'Usuario');
        return Redirect::To($web)->withInput();
    }

    /* --------------------------------------------------------------------- */

    public function destroy($id) {
        $user = User::findOrFail($id);
        $photo = 'profiles/default_user.jpg';
        if ($user->photo != $photo) {
            $path = 'storage/app/';
            Storage::disk('local')->delete($path . $user->photo);
        }
        echo (User::destroy($id)) ? true : false;
    }

    /* --------------------------------------------------------------------- */

    public function prepareData($data) {
        $complete = str_replace('  ', ' ', $data['name']);
        $name = ucwords(mb_strtolower($complete, 'UTF-8'));

        return array(
            'name' => trim($name),
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'birthdate' => $data['birthdate'],
            'identification' => $data['identification'],
            'identification_type_id' => $data['identification_type_id']
        );
    }

    public function getId($user) {
        switch ($user->group_id) {
            case 1:
                return $user->id;
            case 2:
                return $user->student->id;
            case 3:
                return $user->teacher->id;
            case 4:
                return 0;
        }
    }

    public function getGroup($opt) {
        if (!empty($opt)) {
            switch ($opt) {
                case 'admin':
                    return 1;
                case 'student':
                    return 2;
                case 'teacher':
                    return 3;
                case 'godfather':
                    return 4;
            }
        }
    }

    public function general_data() {
        return array(
            'relarions' => Relationship::pluck('name', 'id'),
            'student_type' => Student_Type::pluck('name', 'id'),
            'level_edu' => Levels_education::pluck('name', 'id'),
            'iden_type' => Identification_type::pluck('name', 'id'),
            'gender' => ['m' => 'Masculino', 'f' => 'Femenino', 'o' => 'Otro']
        );
    }

    public function changeAvatar(Request $request) {
        $user = _user();
        $file = $request->file('image');
        $name = 'profiles/' . $user->id . '.jpg';
        $upload = Storage::disk('local')->put($name, File::get($file));

        if ($upload) {
            $user_m = User::find($user->id);
            $user_m->photo = $name;
            $user_m->save();
        }

        return response()->json(['path' => $name]);
    }

    public function changePassword(Request $request) {
        $ok = false;
        $data = $request->all();
        if (!empty($data)) {
            $user = User::findOrFail($data['user_id']);
            $user->password = bcrypt($data['password']);
            if ($user->save()) {
                $ok = true;
            }
        }
        return response()->json(['state' => $ok]);
    }

}