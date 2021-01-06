<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Countries;
use App\Models\DocumentTypes;
use App\Models\Employees;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use DataTables;

const DOMAIN = '@cidenet.com';
const COLOMBIA = 1;
const USA = 2;
const ACTIVE = 1;
const INACTIVE = 0;

class EmployeesController extends Controller
{
    public $countries;
    public $document_types;
    public $areas;

    /**
     * EmployeesController constructor.
     */
    public function __construct(){
        $this->countries = Countries::all();
        $this->document_types = DocumentTypes::all();
        $this->areas = Areas::all();
    }

    public function index(){
        return view('management.employees',[
            'countries' => $this->countries,
            'document_types' => $this->document_types,
            'areas' => $this->areas
        ]);
    }

    /**
     * @param Request $request
     * Method for save or update employees registers
     */
    public function save(Request $request){
        //get values from request
        $first_name = str_replace(' ','', strtolower($request->first_name));
        $first_last_name = str_replace(' ','', strtolower($request->first_last_name));
        $employment_country = $request->employment_country;
        $id = $request->id;

        //Validate the extention of the domain to create email
        $ext = $employment_country == COLOMBIA ? '.co' : '.us';
        $email = $first_name . '.' . $first_last_name . DOMAIN . $ext;

        $currentEmail = Employees::where('email', $email)->first();

        if(!empty($currentEmail)){
            $id = $currentEmail->count_repeat_email + 1;
            $currentEmail->count_repeat_email = $id;
            $currentEmail->save();
            $email = $first_name . '.' . $first_last_name . '.' . $id . DOMAIN . $ext;
        }

        $request->request->add([
            'email' => $email,
            'updated_at' => Carbon::now(),
        ]);

        DB::beginTransaction();
        try{

            //Add created field when going to create a new employee
            if($id == 0) $request->request->add(['created_at' => Carbon::now()]);

            //Leave the values to insert in the database
            $employeeData = $request->except(['id','_token', 'submit']);

            //Update or create employee
            $id != 0 ?  Employees::where('id', $id )->update($employeeData) : Employees::insert($employeeData) ;
            DB::commit();
            return redirect('/')->with('success', __('Saved successfuly'));
        }
        catch(\Exception $e){
            DB::rollback();
            Log::info('ERROR REGISTER => '.$e);
            return redirect('/')->with('errros', __("Employee can't be saved. Please review data and try again later"));
        }
    }

    /**
     * @param $id
     * Find the employee to edit
     */
    public function edit($id){
        $employee = Employees::find($id);

        return view('management.employees',[
            'countries' => $this->countries,
            'document_types' => $this->document_types,
            'areas' => $this->areas,
            'employee' => $employee
        ]);
    }

    /**
     * @param $id
     * Disabled the employee
     */
    public function delete($id){
        try{
            Employees::where('id', $id)->update(['status' => INACTIVE]);
            return redirect('/')->with('success', __('Deleted successfuly'));
        }
        catch (\Exception $e){
            return redirect('/')->with('errros', __("Employee can't be deleted. Please review data and try again later"));
        }

    }

    /**
     * @param Request $request
     * @return mixed
     * Method for visualize data in data table
     */
    public function viewList(Request $request){
        if($request->ajax()){

            //Get all active employees
            $data = Employees::where('status', ACTIVE)->get();

            return DataTables::of($data)
                ->addColumn('document_type_id', function ($model) {
                    return $model->typeDocument->name;
                })
                ->addColumn('employment_country', function ($model) {
                    return $model->employmentCountry->name;
                })
                ->addColumn('status', function ($model) {
                    return $model->status == ACTIVE ? 'Activo' : 'Inactivo';
                })
                ->addColumn('action', function($data){
                    $button = $this->createButtons($data);
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    /**
     * @param $data
     * @return string
     * Method to create buttons of the datatable
     */
    public function createButtons($data){

        $button = '<form action="/edit/'.$data->id.'"   method="POST">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                                    <button type="submit" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i></button>
                                </form>';

        $button .=  '<form action="/delete/'.$data->id.'"   method="POST">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                                    <button type="button" name="delete" value="'.$data->id.'" class="delete btn btn-danger btn-sm"
                                    data-toggle="modal" data-target="#confirmationDeleteModal' . $data->id . '" ><i class="fa fa-trash"></i></button>
                                    <div class="modal fade" id="confirmationDeleteModal' . $data->id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 10px">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Está seguro de que desea eliminar el empleado?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="post" class="btn btn-primary">Aceptar</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>';

        return $button;

    }


}
