<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LibrarianCollection;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserTypeCollection;
use App\Http\Resources\UserTypeCountResource;
use App\Models\User;
use App\Models\UserType;
use Symfony\Component\HttpFoundation\Response;

class UserAPIController extends Controller
{
   public function __construct()
   {
    // $this->middleware('auth:api')->except('index', 'show');
   }

   public function users() {
    return UserCollection::collection(User::paginate(5));
   }

   public function librarians() {
    return LibrarianCollection::collection(User::where('user_type_id', 2)->paginate(5));
   }

   public function students() {
    return StudentCollection::collection(User::where('user_type_id', 1)->paginate(5));
   }

   public function userTypes() {
    return UserTypeCollection::collection(UserType::paginate(5));
   }

   public function userTypesCount() {
    $null = 'null';
    return response([
        'user_types_count' => new UserTypeCountResource($null)
    ], Response::HTTP_OK);
   }
}
