<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;

class Customer extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address_1', 'address_2', 'city', 'state', 'zip', 'company', 'lat', 'lng'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public static function makeCustomersTable(){
        $customers = Self::all();

        return Datatables::of($customers)
            ->addColumn('actions', function ($customer) {
                $table_buttons_html = '<div class="col-sm-10"><div class="col-sm-1"><a class="btn btn-primary btn-sm pull-right" href="/dashboard/customers/edit/' . $customer->id . '" class="btn btn-primary">Edit</a></div>';
                $table_buttons_html .= '<div class="col-sm-1"><a class="btn btn-danger btn-sm" href="/dashboard/customers/destroy/' . $customer->id . '">Delete</a></div></div>';

                return $table_buttons_html;
            })->make(true);
    }
}
