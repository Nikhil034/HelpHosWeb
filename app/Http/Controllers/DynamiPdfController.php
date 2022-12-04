<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class DynamiPdfController extends Controller
{
    function index()
    {
     $customer_data = $this->get_customer_data();
     return view('test')->with('customer_data', $customer_data);
    }
    function get_customer_data()
    {
     $customer_data = DB::table('doctor_description_tbls')
         ->limit(3)
         ->get();
     return $customer_data;
    }
    function get_customer_data2($id)
    {
     $customer_data = DB::table('patient_register_tbls')->select('patient_register_tbls.Patient_name','patient_register_tbls.Patient_phone','patient_register_tbls.Patient_address','patient_register_tbls.Register_date','patient_register_tbls.Patient_pay','patient_register_tbls.Patient_description','doctor_description_tbls.Patient_medicines','doctor_description_tbls.Medicine_pay','doctor_description_tbls.Check_by','doctor_description_tbls.Token')->join('doctor_description_tbls', 'patient_register_tbls.Token', '=', 'doctor_description_tbls.Token')->where('doctor_description_tbls.Token',$id)->get();
     return $customer_data;

    //  return Redirect::back()->with('Message','Patient drug details update succesfully!');
    //  $patientdata = DB::table('patient_register_tbls')->select('patient_register_tbls.Patient_name','patient_register_tbls.Patient_phone','patient_register_tbls.Patient_address','patient_register_tbls.Register_date','patient_register_tbls.Patient_pay','patient_register_tbls.Patient_description','doctor_description_tbls.Patient_medicines','doctor_description_tbls.Medicine_pay','doctor_description_tbls.Check_by')->join('doctor_description_tbls', 'patient_register_tbls.Token', '=', 'doctor_description_tbls.Token')->where('doctor_description_tbls.Isgiven',1)->where('doctor_description_tbls.Token',$req->id)->get()->toArray();
    }
    function pdf(Request $req)
    {
      
     $id=$req->tkn;   
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html($id));
     return $pdf->stream();
    }
    function pdf2(Request $req,$id)
    {
      
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html($id));
     return $pdf->stream();
    }

    function convert_customer_data_to_html($id)
    {
     $customer_data = $this->get_customer_data2($id);
     foreach($customer_data as $customer)
     {
     $output = '
     <h2 align="center" style="text-decoration: underline;">Patient report card</h2>
     <div align="center">
     
     
     <label>Patient Token</label>
     <div style="height: 40px;width: 470px;background-color:#F5F4FF;"><b style="font-size: 20px">'.$customer->Token.'</b></div>
  
     <br><br>
  
         <label>Patient Name</label>
     <div style="height: 40px;width: 470px;background-color:#F5F4FF;"><b style="font-size: 20px">'.$customer->Patient_name.'</b></div>
  
         <br><br>
  
         <label>Patient Phone</label>
     <div style="height: 40px;width: 470px;background-color:#F5F4FF;"><b style="font-size: 20px">'.$customer->Patient_phone.'</b></div>
  
         <br><br>
  
         <label>Patient Address</label>
     <div style="height: 40px;width: 470px;background-color:#F5F4FF;"><b style="font-size: 20px">'.$customer->Patient_address.'</b></div>
  
         <br><br>
  
         <label>Patient Register date</label>
     <div style="height: 40px;width: 470px;background-color:#F5F4FF;"><b style="font-size: 20px">'.$customer->Register_date.'</b></div>

     <br><br>
  
         <label>Patient Register fees</label>
     <div style="height: 40px;width: 470px;background-color:#F5F4FF;"><b style="font-size: 20px">'.$customer->Patient_pay.'</b></div>
  
  
     <br><br>
  
         <label>Patient Desciption</label>
     <div style="height: 40px;width: 470px;background-color:#F5F4FF;"><b style="font-size: 20px">'.$customer->Patient_description.'</b></div>
  
     <br><br>
  
         <label>Patient Medicine details</label>
     <div style="height: 40px;width: 470px;background-color:#F5F4FF;"><b style="font-size: 20px">'.$customer->Patient_medicines.'</b></div>
  
     <br><br>
  
         <label>Patient Medicine fees</label>
     <div style="height: 40px;width: 470px;background-color:#F5F4FF;"><b style="font-size: 20px">'.$customer->Medicine_pay.'</b></div>
  
     <br><br>
  
         <label>Patient Check by</label>
     <div style="height: 40px;width: 470px;background-color:#F5F4FF;"><b style="font-size: 20px">'.$customer->Check_by.'</b></div>
  
  
  

  
    
     '; 
     }
    
    //   $output .= '
    //   <tr>
    //    <td style="border: 1px solid; padding:12px;">'.$customer->Patient_name.'</td>
    //    <td style="border: 1px solid; padding:12px;">'.$customer->Patient_address.'</td>
    //    <td style="border: 1px solid; padding:12px;">'.$customer->Patient_pay.'</td>
    //    <td style="border: 1px solid; padding:12px;">'.$customer->Ischeked.'</td>
    //    <td style="border: 1px solid; padding:12px;">'.$customer->Patient_address.'</td>
    //   </tr>
    //   ';
    //  
    //  $output .= '</table>';
     return $output;
    }

    function Testcall(Request $req)
    {
        return $req->tkn;
    }
}
