<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Validator;
use Auth;
use Redis;

class CustomerController extends Controller
{
    protected $form_data;
    /**
     * CustomerController constructor.
     */
    public function __construct(Request $request){
        $this->form_data['first_name'] = $request->first_name;
        $this->form_data['last_name'] = $request->last_name;
        $this->form_data['company'] = $request->company;
        $this->form_data['email'] = $request->email;
        $this->form_data['phone'] = $request->phone;
        $this->form_data['address_1'] = $request->address_1;
        $this->form_data['address_2'] = $request->address_2;
        $this->form_data['city'] = $request->city;
        $this->form_data['state'] = $request->state;
        $this->form_data['zip'] = $request->zip;
    }

    /**
     * @return customers.blade.php
     */
    public function index(){
        return view('dashboard.customers');
    }

    /**
     * @return customers datatable
     */
    public function fetchCustomersTable(){
        return Customer::makeCustomersTable();
    }

    /**
     * @return mixed
     */
    public function create(){
        return view('customers.add');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(){

        $validator = Validator::make($this->form_data, [
            'email' => 'required|email|max:50',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'company' => 'required|max:100',
            'phone' => 'required|max:50',
            'address_1' => 'required|max:250',
            'address_2' => 'max:100',
            'city' => 'required|max:50',
            'state' => 'required|max:50',
            'zip' => 'required|max:50'
        ]);

        if ($validator->fails()) {
            return redirect('/dashboard/customers/create')
                ->withErrors($validator)
                ->withInput();
        }

        $this->setGeocode($this->form_data['zip']);

        $us_address_validation = $this->validateUSAddress();

        if($us_address_validation) {
            Customer::create($this->form_data);
            return redirect('/dashboard/customers')->withSuccess('Customer Successfully Added');
        }else{
            return redirect()->back()->withErrors('Please enter a valid US Address')->withInput();
        }
    }

    /**
     * @param $customer_id
     * @return mixed
     */
    public function edit($customer_id){
        $customer = Customer::find($customer_id);

        if($customer)
            return view('customers.edit', $customer);

        return redirect('/dashboard/customers')->withErrors('Customer Not Found');
    }

    /**
     * @param $customer_id
     * @param Request $request
     * @return mixed
     */
    public function update($customer_id){
        $validator = Validator::make($this->form_data, [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'company' => 'required|max:100',
            'phone' => 'required|max:50',
            'email' => 'required|email|max:50',
            'address_1' => 'required|max:250',
            'address_2' => 'max:100',
            'city' => 'required|max:50',
            'state' => 'required|max:50',
            'zip' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('/dashboard/customers/edit/'.$customer_id)
                ->withErrors($validator)
                ->withInput();
        }

        $this->setGeocode($this->form_data['zip']);

        $us_address_validation = $this->validateUSAddress();

        if($us_address_validation) {

            if (Customer::where('id', $customer_id)->update($this->form_data))
                return redirect()->back()->withSuccess('Customer Successfully Updated');

            return redirect()->back()->withErrors('Failed Update Customer!');
        }else{
            return redirect()->back()->withErrors('Please enter a valid US Address')->withInput();

        }

    }

    /**
     * @param $customer_id
     * @return mixed
     */
    public function destroy($customer_id){
        Customer::destroy($customer_id);
        return redirect('/dashboard/customers');
    }

    private function validateUSAddress(){
        $redis = Redis::connection();

        $address = $this->getFormattedAddress();

        if($redis->get($address))
            return true;

            //  Initiate curl
        $ch = curl_init();
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL,'https://api.smartystreets.com/street-address?auth-id=3778b66c-79ad-d4c5-5703-c34d023ae802&auth-token=2DnxmXWb8gi7ykEbOiBW&'.$address);

        // Execute
        $api_result=curl_exec($ch);
        // Closing
        curl_close($ch);

        if(json_decode($api_result)){
            $redis->set($address, $address);
            return true;
        }

        return false;

    }

    private function getFormattedAddress(){
        return 'street='.urlencode($this->form_data['address_1']).'&city='.urlencode($this->form_data['city']).'&state='.urlencode($this->form_data['state']).'&zip='.urlencode($this->form_data['zip']);
    }

    private function setGeocode($zip){
        $lat = '';
        $lng = '';
        //  Initiate curl
        $ch = curl_init();
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL,'http://maps.googleapis.com/maps/api/geocode/json?address='.$zip.'&sensor=false');
        // Execute
        $result=curl_exec($ch);
        // Closing
        curl_close($ch);

        $results = json_decode($result, true);

        if($results['status'] == 'OK'){
            $lat = $results['results'][0]['geometry']['location']['lat'];
            $lng = $results['results'][0]['geometry']['location']['lng'];
        }

        $this->form_data['lat'] = $lat;
        $this->form_data['lng'] = $lng;
    }

}
