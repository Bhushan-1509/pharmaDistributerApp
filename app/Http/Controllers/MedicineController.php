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
        ],[
            'medicineName.required' => 'Medicine name is required',
            'medicineName.string' => 'medicine name must be text',
            'medicineName.max' => 'medicine name can have maximum 255 characters',
            'desc.required' => 'Description field is required',
            'image.required' => 'Medicine image is required',
            'image.mimes' => 'Medicine image can be of type jpg,jpeg,png,webp'
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
            $request->session()->flash('st','success');
            return view('admin.addmedicine',['class'=>'alert alert-success text-center','text'=> 'Medicine added successfully !']);
        }
        else{
            $request->session()->flash('st','failure');
            return view('admin.addmedicine',['class'=>'alert alert-danger text-center','text'=> 'Could not add medicine !']);
        }
}

    public function showInfo(Request $request){
        $id = $request->route('id');
        $medicine = Medicine::where('medicine_id','=',$id)->first();
        $shareComponent = \Share::page(
            url()->current(),
            'Have a look at this medicine !',
        )
            ->twitter()
            ->linkedin()
            ->whatsapp();

        if($medicine){
            return view('medicineinfo',['shareComponent' => $shareComponent,'medicine' => $medicine]);
        }
        else{
            return view('errors.404');
        }
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
        ],[
            'medicineName.required' => 'Medicine name is required',
            'medicineName.string' => 'medicine name must be text',
            'medicineName.max' => 'medicine name can have maximum 255 characters',
            'desc.required' => 'Description field is required',
            'image.mimes' => 'Medicine image can be of type jpg,jpeg,png,webp'
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
            $request->session()->flash('st','success');
            return view('admin.editmedicine', ['class' => 'alert alert-success text-center', 'text' => 'Medicine updated successfully !']);
        }
        else{
            $request->session()->flash('st','failure');
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

    public function searchMedicine(Request $request){
        $searchParameter =  $request->query('q');
        $medicines = Medicine::query( 'LOWER(`medicine_name`)','LIKE', '%'. strtolower(trim($searchParameter)) . '%')->get();
        if(!$medicines){
            return view('noresults');
        }
        else{
            return view('medicineresult', ['medicines' => $medicines]);
        }
    }
}
