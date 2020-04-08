<?php

namespace App\Providers;
use DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    

        /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('franchisee_registration_code', function ($attribute, $value, $parameters, $validator) {
            return $value === 'supersecretcode';
        });

        Validator::extend('parent_registration_code', function ($attribute, $value, $parameters, $validator) {
            $query = DB::table('users')->where('verification_code',$value)->select('id','verification_code')->get();
            if (!empty($query[0]->id)) {
                if(count($query) >'0'){
                    return $value === $query[0]->verification_code;
                }else{
                    return $value === 0;
                }
            }else{
                return $value === 0;
            }           
            
        });

    }



    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
