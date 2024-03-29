<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class User extends Authenticatable
{    
    use Notifiable;
    use SoftDeletes;
    use HasApiTokens;
    use HasFactory;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'school_id',
        'email',
        'password',
        'first_name',
        'last_name',
        'mobile_number',
        'city',
        'zip_code',
        'tfa_enabled',
        'email_verified_at',
        'mobile_verified_at',
        'role_id',
        'profile_image',
        'teacher_type_id',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'school_id' => 'integer',
        'email' => 'string',
        'password' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'mobile_number' => 'string',
        'city' => 'string',
        'zip_code' => 'integer',
        'tfa_enabled' => 'boolean',
        'email_verified_at' => 'integer',
        'mobile_verified_at' => 'integer',
        'role_id' => 'integer',
        'profile_image' => 'string',
        'remember_token' => 'string',
        'teacher_type_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'school_id' => 'required|integer|max:255',
        'email' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        'first_name' => 'nullable|string|max:255',
        'last_name' => 'nullable|string|max:255',
        'mobile_number' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'zip_code' => 'nullable|integer',
        'tfa_enabled' => 'boolean',
        'email_verified_at' => 'integer',
        'mobile_verified_at' => 'integer',
        'profile_image' => 'nullable|string|max:255',
        'remember_token' => 'nullable|string|max:255',
        'role_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'teacher_type_id' => 'nullable|integer'
    ];

    public function getProfileImageAttribute($value)
    {
        return URL::to('/profile_images/') .'/'. $value; 
    }
    
    public function getExistingEmail($email)
    {
        $user = User::where('email', $email)->first();

        if(null == $user){
            return true;
        }
        return false;
    }

    public function checkRegister($email)
    {
        $user = User::where('email', $email)->first();

        if(null != $user){
            return $email;
        }
        return false;
    }

    public function checkCreditials($email, $password) 
    {
        $user = User::where('email', $email)->first();
        if (null != $user && Hash::check($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }

    public function emailVerified($email) 
    {
        $email = User::where('email', $email)->first()->email_verified_at;
        if ($email != null) {
            return $email;
        } else {
            return false;
        }
    }

    // public static function boot()
    // {
    //     parent::boot();

    //     self::creating(function($model){
    //         $teacher = User::where('email',$model->email)->first();
    //         if ($teacher == null) {
    //             //$model->save();
    //             print_r('Null');die();
    //             // $saveTeacher = (new SaveTeacherCSVJobs($model));
    //             // dispatch($saveTeacher);
    //         }

    //         print_r("NotNull");die();
    //     });
    // }

    public function domainValidation($request)
    {
        $email_domain = explode('@',$request['email'])[1];
        $school_domain = School::where('id',$request->school_id)->first()->school_domain;

        if($email_domain == $school_domain){
            return true;
        }
        return false;
    }

    public  function saveCSV($array,$school_id)
    {
        $teachers = $array[0];

        foreach($teachers as $teacher) {
            $jobs = new SaveTeacherCSVJobs($teacher,$school_id);
            dispatch($jobs);
        }

    }

    public function uploadImage($request)
    {   
        $image_url = 'profile_image'."_".time().".jpg";
        $image = $request->profile_image;
        $return = $image->move(public_path('/profile_images/'), $image_url);
        return ($image_url);
    }

    public function search($request) 
    {
        $user = auth()->user();
        if ($user->role_id == 1) {
            $teachers = User::where('email', 'LIKE', "%{$request->email}%")
                            ->where('first_name', 'LIKE', "%{$request->first_name}%")
                            ->where('school_id', $request->school_id)
                            ->get();
        } else {
            $teachers = User::where('email', 'LIKE', "%{$request->email}%")
                            ->where('first_name', 'LIKE', "%{$request->first_name}%")
                            ->where('school_id', $user->school_id)
                            ->get();
        }
        return $teachers;
    }
    
    public function searchTeacher($request)  
    {
        $user = auth()->user();
        $teachers = User::where('teacher_type_id',$request->teacher_type_id)
                            ->where('school_id', $user->school_id)
                            ->where('id','!=' ,$user->id)
                            ->get();
        return $teachers;
    }
}
