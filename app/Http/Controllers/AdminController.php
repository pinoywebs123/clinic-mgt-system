<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicine;
use App\MedicineStock;
use App\Patient;
use App\PatientMedicine;

class AdminController extends Controller
{
    public function admin_home(){
        $medicines = Medicine::orderBy('created_at','desc')->get();
    	return view('admin.home',compact('medicines'));
    }
    public function admin_logout(){
    	\Auth::logout();
    	return redirect('/');
    }

    public function admin_patient(){
        $patients = Patient::orderBy('created_at','desc')->get();
    	return view('admin.patient',compact('patients'));
    }

    public function admin_reports(){
        if(!empty($_GET['start']) && !empty($_GET['end'])){
            $medicines = PatientMedicine::orderBy('created_at','desc')->where('status_id',1)->whereBetween('created_at',[$_GET['start'],$_GET['end']])->get();
        return view('admin.reports',compact('medicines'));  
        }
        $medicines = PatientMedicine::orderBy('created_at','desc')->where('status_id',1)->get();
    	return view('admin.reports',compact('medicines'));
    }

    public function admin_medicine_create(Request $request){
        Medicine::create($request->all());
        return redirect()->back()->with('suc','New Medicine Added!');
    }

    public function admin_patient_create(Request $request){
        Patient::create($request->all());
        return redirect()->back()->with('suc','New Medicine Added!');
    }

    public function admin_edit($id){
        $find = Medicine::findOrFail($id);
        return view('admin.medicine.edit',compact('find'));
    }

    public function admin_edit_check(Request $request,$id){
        $find = Medicine::findOrFail($id);
        $find->update($request->all());
        return redirect()->back()->with('suc',' Medicine updated!');
    }

    public function admin_quantity($id){
       $find = Medicine::findOrFail($id);
       return view('admin.medicine.quantity',compact('find'));
    }

    public function admin_quantity_check(Request $request,$id){
        $find = Medicine::findOrFail($id);
        $find->quantity = $find->quantity + $request->quantity;
        $find->expiration = $request->expiration;
        $find->save();
        return redirect()->back()->with('suc',' Medicine Quantity updated!');

    }

    public function admin_patient_edit($id){
        $find = Patient::findOrFail($id);
        return view('admin.patient.edit',compact('find'));
    }

    public function admin_patient_edit_check(Request $request,$id){
        $find = Patient::findOrFail($id);
        $find->update($request->all());
        return redirect()->back()->with('suc',' Patient Info updated!');
    }

    public function admin_patient_medicine($id){
        $medicines = Medicine::orderBy('created_at','desc')->get();
        $find = Patient::findOrFail($id);
        $patmed = PatientMedicine::where('patient_id',$id)->where('status_id',0)->get();
        return view('admin.patient.medicine',compact('find','medicines','patmed'));
    }

    public function admin_patient_medicine_check(Request $request,$user_id,$medicine_id){
        
         $medicine = Medicine::findOrFail($medicine_id);
        if($medicine->quantity < $request->quantity){
            return redirect()->back()->with('err',' Insufficient stock!');
        }

        $patmed = new PatientMedicine;
        $patmed->patient_id = $user_id;
        $patmed->medicine_id = $medicine_id;
        $patmed->quantity = $request->quantity;
        $patmed->status_id = 0;
        $patmed->save();

        $medicine->quantity = $medicine->quantity - $request->quantity;
        $medicine->save();
        return redirect()->back()->with('suc','Patient aquire medicine!');
        

    }

    public function admin_patient_medicine_remove($id){
        $find = PatientMedicine::findOrFail($id);
         $find->medicine->quantity = $find->medicine->quantity + $find->quantity;
        $find->medicine->save();
        $find->delete();    
        return redirect()->back()->with('err','Patient medicine removed!');

    }

    public function admin_patient_medicine_approved($id){
         $finds = PatientMedicine::where('patient_id',$id)->where('status_id',0)->get();
        foreach($finds as $find){
           $find->update(['status_id'=> 1]);

        }
        return redirect()->back()->with('suc','Patient medicine has been confimed!');
    }
}
