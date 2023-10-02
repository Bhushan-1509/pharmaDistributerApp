<?php

namespace App\Http\Controllers;

use Faker\Core\File;
use Faker\Provider\HtmlLorem;
use Illuminate\Http\Request;
use App\Models\Medicine;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class MedicineController extends Controller
{
    public function handle(Request $request){
        $validated = $request->validate([
            'medicineName' => 'required|string|max:255',
            'desc' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp'
        ]);
        $medicineName = $request->post('medicineName');
        $desc = $request->post('desc');
        $imgFile = $request->file('image');
        $fileName = time() . $imgFile->getClientOriginalName();
        $filePath = 'images/uploads/' . $fileName;
        $imgFile->move('images/uploads/', $fileName);
        $medicine = new Medicine();
        $medicine->medicine_name = $medicineName;
        $medicine->description = $desc;
        $medicine->img_path = $filePath;
        $res = $medicine->save();
        if($res){
            return view('admin.addmedicine',['class'=>'alert alert-success text-center','text'=> 'Medicine added successfully !']);
        }
        else{
            return view('admin.addmedicine',['class'=>'alert alert-danger text-center','text'=> 'Could not add medicine !']);
        }

    }

    public function showInfo(Request $request){
        $request->session()->put('id',intval($request->route('id')));
        return view('medicineinfo');
    }

    public function adminEdit(Request $request){
        $request->session()->put('id',intval($request->route('id')));
        return view('admin.editmedicine',['class'=>'none','text' => '']);
    }

    public function updateMedicine(Request $request){
        $validated = $request->validate([
            'medicineName' => 'required|string|max:255',
            'desc' => 'required',
            'image' => 'mimes:jpg,jpeg,png,webp'
        ]);
        $medicineName = $request->post('medicineName');
        $desc = $request->post('desc');
        $filePath = "";
        if($request->file('image')){
            $imgFile = $request->file('image');
            $fileName = time() . $imgFile->getClientOriginalName();
            $filePath = 'images/uploads/' . $fileName;
            $imgFile->move('images/uploads/', $fileName);
        }
        $medicine = Medicine::where('medicine_id','=',intval(request()->route('id')))->first();
        $medicine->medicine_name = $medicineName;
        $medicine->description = $desc;
        if($request->file('image')){
            $medicine->img_path = $filePath;
        }
        $res = $medicine->save();
        if($res) {
            return view('admin.editmedicine', ['class' => 'alert alert-success text-center', 'text' => 'Medicine updated successfully !']);
        }
        else{
            return view('admin.editmedicine',['class'=>'alert alert-danger text-center','text'=> 'Could not update medicine !']);
        }

    }


    public function adminDelete(Request $request){
        $id = request()->route('id');
        Http::get('http://localhost:8000/medicines/delete/' . $id);
    }

    public function deleteMedicine(Request $request){
        $id = request()->route('id');
        $medicine = Medicine::find(intval($id));
        $imgFile = $medicine->img_path;
        unlink(public_path($imgFile));
        $res = $medicine->delete();
        return redirect('admin/medicines');
    }
}
