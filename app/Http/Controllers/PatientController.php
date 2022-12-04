<?php

namespace App\Http\Controllers;
use Redirect;
use App\Models\patient_register_tbl;
use DB;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    function SavePatient(Request $req)
    {
        $patient_obj=new patient_register_tbl;
        $patient_obj->Token=$req->pat_token;
        $patient_obj->Patient_name=$req->pat_name;
        $patient_obj->Patient_phone=$req->pat_phone;
        $patient_obj->Patient_address=$req->pat_address;
        $patient_obj->Patient_pay=$req->pay_fees;
        $patient_obj->Register_date=$req->reg_date;
        $patient_obj->Ischeked=0;
        $patient_obj->Patient_description=$req->pat_description;
        $patient_obj->save();
        return Redirect::back()->with('Message','Patient register successfully!');
    }
    function viewpage()
    {

        return view('viewhistory',['historydata'=>0]);
    }
    function Filterpatientdata(Request $req)
    {
        $Date=$req->dd;
        $patientdata = DB::table('patient_register_tbls')->select('patient_register_tbls.token','patient_register_tbls.Patient_name','patient_register_tbls.Register_date','doctor_description_tbls.Check_by')->join('doctor_description_tbls', 'patient_register_tbls.Token', '=', 'doctor_description_tbls.Token')->where('patient_register_tbls.Register_date',$Date)->get();
        return view('viewhistory',['historydata'=>$patientdata]);
        // return $patientdata;
    }
   
    
}
