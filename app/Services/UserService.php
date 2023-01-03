<?php

namespace App\Services;
 
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class UserService
{
    public function storeLibrarian(Request $request): User
    {
        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . $image->getClientOriginalName();
            // This will generate an image with transparent background
            $canvas = Image::canvas(445, 445);
            $image  = Image::make($image->getRealPath())->resize(445, 445, function($constraint)
            {$constraint->aspectRatio();});
            $canvas->insert($image, 'center');
            $URL = url()->current();
            if (!str_contains($URL, 'tim4')) {
                if (!file_exists(public_path() . '\storage\librarians')) {
                    mkdir('storage\librarians', 666, true);
                }
            }
            $canvas->save('storage/librarians/'. $filename, 75);
        } 

        $user = User::create([
            ...$request->validated(), 
            'last_login_at' => Carbon::now(),
            'user_type_id' => 2,
            'photo' => $filename,
            'password' => Hash::make($request->password)
        ]);

        return $user;
    }

    public function storeAdministrator(Request $request): User
    {
        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . $image->getClientOriginalName();
            // This will generate an image with transparent background
            $canvas = Image::canvas(445, 445);
            $image  = Image::make($image->getRealPath())->resize(445, 445, function($constraint)
            {$constraint->aspectRatio();});
            $canvas->insert($image, 'center');
            $URL = url()->current();
            if (!str_contains($URL, 'tim4')) {
                if (!file_exists(public_path() . '\storage\administrators')) {
                    mkdir('storage\administrators', 666, true);
                }
            }
            $canvas->save('storage/administrators/'. $filename, 75);
            $validated['photo'] = $filename; 
        } 

        $user = User::create([
            ...$request->validated(), 
            'last_login_at' => Carbon::now(),
            'user_type_id' => 3,
            'photo' => $filename,
            'password' => Hash::make($request->password)
        ]);

        return $user;
    }

    public function storeStudent(Request $request): User
    {
        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . $image->getClientOriginalName();
            // This will generate an image with transparent background
            $canvas = Image::canvas(445, 445);
            $image  = Image::make($image->getRealPath())->resize(445, 445, function($constraint)
            {$constraint->aspectRatio();});
            $canvas->insert($image, 'center');
            $URL = url()->current();
            if (!str_contains($URL, 'tim4')) {
                if (!file_exists(public_path() . '\storage\students')) {
                    mkdir('storage\students', 666, true);
                }
            }
            $canvas->save('storage/students/'. $filename, 75);
            $validated['photo'] = $filename; 
        } 

        $user = User::create([
            ...$request->validated(), 
            'last_login_at' => Carbon::now(),
            'user_type_id' => 1,
            'photo' => $filename,
            'password' => Hash::make($request->password)
        ]);

        return $user;
    }
}