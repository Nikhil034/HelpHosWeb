<?php

namespace App\Http\Controllers;
use App\Models\patient_register_tbl;
use App\Models\medicine_tbl;
use App\Models\doctor_description_tbl;
use Redirect;
use Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class DoctorController extends Controller
{
    
    function loadToken()
    {
        //Need to improvment because response time goes high
        $todayDate=date("Y-m-d");
        $status=0;
        $TokenLoad = patient_register_tbl::select('Token')->where('Register_date',$todayDate)->where('Ischeked',$status)->get()->toArray();
        $DrugLoad=medicine_tbl::select('drug_name')->get()->toArray();
        return view('doctor',['data1'=>$TokenLoad],['data2'=>$DrugLoad]);
        
    }
    function FetchTokenData(Request $req)
    {
        
        $record=DB::table('patient_register_tbls')->where('Token',$req->id)->get();
        return $record;
    }
    function DoctorDetailsforpatient(Request $req)
    {
    
       $status=1; 
       DB::update('update patient_register_tbls set Ischeked = ? where Token = ?',[$status,$req->pt_token]);
       $dctr_obj=new doctor_description_tbl;
       $dctr_obj->Token=$req->pt_token;
       $dctr_obj->Patient_problem=$req->pt_prblm;
       $dctr_obj->Patient_medicines=$req->pt_drug_lst;
       $dctr_obj->Check_by=$req->pt_ck_dct;
       $dctr_obj->save();
       return Redirect::back()->with('Message','Patient medicines details succesfully added!');

    }
    function Medicineload()
    {
        $todayDate=date("Y-m-d");
        $nameofpatients = DB::table('patient_register_tbls')->select('patient_register_tbls.Token','patient_register_tbls.Patient_name','doctor_description_tbls.Patient_medicines','doctor_description_tbls.Check_by')->join('doctor_description_tbls', 'patient_register_tbls.Token', '=', 'doctor_description_tbls.Token')->where('patient_register_tbls.Register_date',$todayDate)->where('doctor_description_tbls.Isgiven',0)->get()->toArray();
        // return $nameofpatients[1];
        return view('Medical',['data'=>$nameofpatients]);
    }
    function Updatedrug(Request $req,$id)
    {          
          return view('medicaledit',['id'=>$id]);
    }
    function Updatedrugsave(Request $req)
    {

        DB::table('doctor_description_tbls')->where('Token',$req->tk)->update(['Medicine_pay' =>$req->pd,'Isgiven'=>1]);
        return Redirect::back()->with('Message','Patient drug details update succesfully!');
        
    }
    function checkPage()
    {
        $status=1;
        $TokenLoad = doctor_description_tbl::select('Token')->where('Isgiven',$status)->get()->toArray();
        return view('checkpatient',['data'=>$TokenLoad]);
        
    }
    function FetchPatientData(Request $req)
    {
        $todayDate=date("Y-m-d");
        $patientdata = DB::table('patient_register_tbls')->select('patient_register_tbls.Patient_name','patient_register_tbls.Patient_phone','patient_register_tbls.Patient_address','patient_register_tbls.Register_date','patient_register_tbls.Patient_pay','patient_register_tbls.Patient_description','doctor_description_tbls.Patient_medicines','doctor_description_tbls.Medicine_pay','doctor_description_tbls.Check_by')->join('doctor_description_tbls', 'patient_register_tbls.Token', '=', 'doctor_description_tbls.Token')->where('doctor_description_tbls.Isgiven',1)->where('doctor_description_tbls.Token',$req->id)->get()->toArray();
        return $patientdata;
    }

}
