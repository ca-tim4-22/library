<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdministratorCollection;
use App\Http\Resources\LibrarianCollection;
use App\Http\Resources\LibrarianFemaleCollection;
use App\Http\Resources\LibrarianMaleCollection;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentFemaleCollection;
use App\Http\Resources\StudentMaleCollection;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserTypeCollection;
use App\Http\Resources\UserTypeCountResource;
use App\Models\User;
use App\Models\UserType;
use Symfony\Component\HttpFoundation\Response;

class UserAPIController extends Controller
{
    public function users()
    {
        return UserCollection::collection(User::paginate(5));
    }

    public function students()
    {
        return StudentCollection::collection(User::where('user_type_id', 1)
            ->paginate(5));
    }

    public function librarians()
    {
        return LibrarianCollection::collection(User::where('user_type_id', 2)
            ->paginate(5));
    }

    public function administrators()
    {
        return AdministratorCollection::collection(User::where('user_type_id',
            3)->paginate(5));
    }

    public function userTypes()
    {
        return UserTypeCollection::collection(UserType::paginate(5));
    }

    public function userTypesCount()
    {
        $null = 'null';

        return response([
            'user_types_count' => new UserTypeCountResource($null)
        ], Response::HTTP_OK);
    }

    public function studentsMale()
    {
        return StudentMaleCollection::collection(User::where([
            'user_gender_id' => 1,
            'user_type_id'   => 1,
        ])->paginate(5));
    }

    public function studentsFemale()
    {
        return StudentFemaleCollection::collection(User::where([
            'user_gender_id' => 2,
            'user_type_id'   => 1,
        ])->paginate(5));
    }

    public function librariansMale()
    {
        return LibrarianMaleCollection::collection(User::where([
            'user_gender_id' => 1,
            'user_type_id'   => 2,
        ])->paginate(5));
    }

    public function librariansFemale()
    {
        return LibrarianFemaleCollection::collection(User::where([
            'user_gender_id' => 2,
            'user_type_id'   => 2,
        ])->paginate(5));
    }

    public function sortLibrarians($parameter)
    {
        if ($parameter == 'desc') {
            $order = 'desc';
        } else {
            $order = 'asc';
        }
        $filter = User::where('user_type_id', 2)->orderBy('id', $order)->get();
        return $filter;
    }

    public function sortStudents($parameter)
    {
        if ($parameter == 'desc') {
            $order = 'desc';
        } else {
            $order = 'asc';
        }
        $filter = User::where('user_type_id', 1)->orderBy('id', $order)->get();
        return $filter;
    }

    public function sortAdministrators($parameter)
    {
        if ($parameter == 'desc') {
            $order = 'desc';
        } else {
            $order = 'asc';
        }
        $filter = User::where('user_type_id', 3)->orderBy('id', $order)->get();
        return $filter;
    }
}
