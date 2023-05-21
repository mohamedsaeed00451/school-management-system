<?php

namespace App\Http\Livewire;

use App\Models\BloodType;
use App\Models\Image;
use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Religion;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddParents extends Component
{
    use WithFileUploads;

    public $currentStep = 1, $catchError,

    $Email, $Password, $Name_Father_ar,
    $Name_Father_en, $Job_Father_ar,
    $Job_Father_en, $National_ID_Father,
    $Passport_ID_Father, $Phone_Father,
    $Nationality_Father_ID, $Blood_Type_Father_ID,
    $Religion_Father_ID, $Address_Father,

    $Name_Mother_ar,
    $Name_Mother_en, $Job_Mother_ar,
    $Job_Mother_en, $National_ID_Mother,
    $Passport_ID_Mother, $Phone_Mother,
    $Nationality_Mother_ID, $Blood_Type_Mother_ID,
    $Religion_Mother_ID, $Address_Mother,

    $updateMode = false,
    $photos,
    $show_table = true,
    $Parent_id;

    public function render()
    {
        return view('livewire.Parents.add-parents', [
            'Nationalities' => Nationalitie::all(),
            'Type_Bloods' => BloodType::all(),
            'Religions' => Religion::all(),
            'my_parents' => MyParent::all(),
        ]);
    }

    public function showformadd()
    {
        $this->show_table = false;
        $this->currentStep = 1;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'Email' => 'required|email',
            'Password' => 'required|min:6',
            'National_ID_Father' => 'required|string|min:14|max:14|regex:/[0-9]{9}/',
            'Passport_ID_Father' => 'min:14|max:14',
            'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'National_ID_Mother' => 'required|string|min:14|max:14|regex:/[0-9]{9}/',
            'Passport_ID_Mother' => 'min:14|max:14',
            'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11'
        ]);
    }
    public function firstStepSubmit()
    {
        $this->validate([
            'Email' => 'required|unique:my_parents,email,' . $this->id,
            'Password' => 'required|min:8',
            'Name_Father_ar' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father_ar' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|min:14|max:14|unique:my_parents,National_ID_Father,' . $this->id,
            'Passport_ID_Father' => 'required|min:14|max:14|unique:my_parents,Passport_ID_Father,' . $this->id,
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'Nationality_Father_ID' => 'required',
            'Blood_Type_Father_ID' => 'required',
            'Religion_Father_ID' => 'required',
            'Address_Father' => 'required',
        ]);

        $this->currentStep = 2;
    }
    public function secondStepSubmit()
    {
        $this->validate([
            'Name_Mother_ar' => 'required',
            'Name_Mother_en' => 'required',
            'National_ID_Mother' => 'required|min:14|max:14|unique:my_parents,National_ID_Mother,' . $this->id,
            'Passport_ID_Mother' => 'required|min:14|max:14|unique:my_parents,Passport_ID_Mother,' . $this->id,
            'Phone_Mother' => 'required',
            'Job_Mother_ar' => 'required',
            'Job_Mother_en' => 'required',
            'Nationality_Mother_ID' => 'required',
            'Blood_Type_Mother_ID' => 'required',
            'Religion_Mother_ID' => 'required',
            'Address_Mother' => 'required',
        ]);

        $this->currentStep = 3;
    }
    public function back($step)
    {
        $this->currentStep = $step;
    }
    public function submitForm()
    {
        try {

            DB::beginTransaction();
            $Parent = MyParent::create([
                'email' => $this->Email,
                'password' => Hash::make($this->Password),
                'Name_Father' => ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father_ar],
                'Job_Father' => ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father_ar],
                'National_ID_Father' => $this->National_ID_Father,
                'Passport_ID_Father' => $this->Passport_ID_Father,
                'Phone_Father' => $this->Phone_Father,
                'Nationality_Father_ID' => $this->Nationality_Father_ID,
                'Blood_Type_Father_ID' => $this->Blood_Type_Father_ID,
                'Religion_Father_ID' => $this->Religion_Father_ID,
                'Address_Father' => $this->Address_Father,

                'Name_Mother' => ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother_ar],
                'National_ID_Mother' => $this->National_ID_Mother,
                'Passport_ID_Mother' => $this->Passport_ID_Mother,
                'Phone_Mother' => $this->Phone_Mother,
                'Job_Mother' => ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother_ar],
                'Nationality_Mother_ID' => $this->Nationality_Mother_ID,
                'Blood_Type_Mother_ID' => $this->Blood_Type_Mother_ID,
                'Religion_Mother_ID' => $this->Religion_Mother_ID,
                'Address_Mother' => $this->Address_Mother,
            ]);

            if (!empty($this->photos)) {
                foreach ($this->photos as $photo) {
                    $imageName = $photo->getClientOriginalName();
                    //Upload In Database
                    Image::create([
                        'filename' => $imageName,
                        'imageable_id' => $Parent->id,
                        'imageable_type' => MyParent::class, //App\Models\MyParent
                    ]);
                    //Upload In Server
                    $photo->storeAs('Parents/' . $this->National_ID_Father, $imageName, 'Attachments');
                }
            }

            DB::commit();
            toastr()->success(trans('Message_trans.Success'));
            $this->clearForm();
            return redirect()->to('/Parents');
        } catch (Exception $e) {
            DB::rollBack();
            $this->catchError = $e->getMessage();
        }
    }

    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;

        $My_Parent = MyParent::where('id', $id)->first();

        $this->Parent_id = $id;
        $this->Email = $My_Parent->email;
        $this->Name_Father_ar = $My_Parent->getTranslation('Name_Father', 'ar');
        $this->Name_Father_en = $My_Parent->getTranslation('Name_Father', 'en');
        $this->Job_Father_ar = $My_Parent->getTranslation('Job_Father', 'ar');
        ;
        $this->Job_Father_en = $My_Parent->getTranslation('Job_Father', 'en');
        $this->National_ID_Father = $My_Parent->National_ID_Father;
        $this->Passport_ID_Father = $My_Parent->Passport_ID_Father;
        $this->Phone_Father = $My_Parent->Phone_Father;
        $this->Nationality_Father_ID = $My_Parent->Nationality_Father_ID;
        $this->Blood_Type_Father_ID = $My_Parent->Blood_Type_Father_ID;
        $this->Address_Father = $My_Parent->Address_Father;
        $this->Religion_Father_ID = $My_Parent->Religion_Father_ID;

        $this->Name_Mother_ar = $My_Parent->getTranslation('Name_Mother', 'ar');
        $this->Name_Mother_en = $My_Parent->getTranslation('Name_Father', 'en');
        $this->Job_Mother_ar = $My_Parent->getTranslation('Job_Mother', 'ar');
        ;
        $this->Job_Mother_en = $My_Parent->getTranslation('Job_Mother', 'en');
        $this->National_ID_Mother = $My_Parent->National_ID_Mother;
        $this->Passport_ID_Mother = $My_Parent->Passport_ID_Mother;
        $this->Phone_Mother = $My_Parent->Phone_Mother;
        $this->Nationality_Mother_ID = $My_Parent->Nationality_Mother_ID;
        $this->Blood_Type_Mother_ID = $My_Parent->Blood_Type_Mother_ID;
        $this->Address_Mother = $My_Parent->Address_Mother;
        $this->Religion_Mother_ID = $My_Parent->Religion_Mother_ID;
    }
    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->validate([
            'Email' => 'required|unique:my_parents,email,' . $this->Parent_id,
            'Name_Father_ar' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father_ar' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|min:14|max:14|unique:my_parents,National_ID_Father,' . $this->Parent_id,
            'Passport_ID_Father' => 'required|min:14|max:14|unique:my_parents,Passport_ID_Father,' . $this->Parent_id,
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'Nationality_Father_ID' => 'required',
            'Blood_Type_Father_ID' => 'required',
            'Religion_Father_ID' => 'required',
            'Address_Father' => 'required',
        ]);
        $this->currentStep = 2;
    }
    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->validate([
            'Name_Mother_ar' => 'required',
            'Name_Mother_en' => 'required',
            'National_ID_Mother' => 'required|min:14|max:14|unique:my_parents,National_ID_Mother,' . $this->Parent_id,
            'Passport_ID_Mother' => 'required|min:14|max:14|unique:my_parents,Passport_ID_Mother,' . $this->Parent_id,
            'Phone_Mother' => 'required',
            'Job_Mother_ar' => 'required',
            'Job_Mother_en' => 'required',
            'Nationality_Mother_ID' => 'required',
            'Blood_Type_Mother_ID' => 'required',
            'Religion_Mother_ID' => 'required',
            'Address_Mother' => 'required',
        ]);
        $this->currentStep = 3;
    }
    public function submitForm_edit()
    {
        if ($this->Parent_id) {
            try {
                DB::beginTransaction();
                $Parent = MyParent::findOrfail($this->Parent_id);

                $password = $Parent->password;
                if (!empty($this->Password)) {
                    $password = Hash::make($this->Password);
                }

                $Parent->update([
                    'email' => $this->Email,
                    'password' => $password,
                    'Name_Father' => ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father_ar],
                    'Job_Father' => ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father_ar],
                    'National_ID_Father' => $this->National_ID_Father,
                    'Passport_ID_Father' => $this->Passport_ID_Father,
                    'Phone_Father' => $this->Phone_Father,
                    'Nationality_Father_ID' => $this->Nationality_Father_ID,
                    'Blood_Type_Father_ID' => $this->Blood_Type_Father_ID,
                    'Religion_Father_ID' => $this->Religion_Father_ID,
                    'Address_Father' => $this->Address_Father,

                    'Name_Mother' => ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother_ar],
                    'National_ID_Mother' => $this->National_ID_Mother,
                    'Passport_ID_Mother' => $this->Passport_ID_Mother,
                    'Phone_Mother' => $this->Phone_Mother,
                    'Job_Mother' => ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother_ar],
                    'Nationality_Mother_ID' => $this->Nationality_Mother_ID,
                    'Blood_Type_Mother_ID' => $this->Blood_Type_Mother_ID,
                    'Religion_Mother_ID' => $this->Religion_Mother_ID,
                    'Address_Mother' => $this->Address_Mother,
                ]);

                if (!empty($this->photos)) {
                    foreach ($this->photos as $photo) {
                        $imageName = $photo->getClientOriginalName();
                        //Upload In Database
                        Image::create([
                            'filename' => $imageName,
                            'imageable_id' => $Parent->id,
                            'imageable_type' => MyParent::class, //App\Models\MyParent
                        ]);
                        //Upload In Server
                        $photo->storeAs('Parents/' . $this->National_ID_Father, $imageName, 'Attachments');
                    }
                }

                DB::commit();
                toastr()->success(trans('Message_trans.Update'));
                $this->clearForm();
                return redirect()->to('/Parents');
            } catch (Exception $e) {
                DB::rollBack();
                $this->catchError = $e->getMessage();
            }
        }
    }
    public function delete($id)
    {
        try {
            $images = Image::where('imageable_id', $id)->where('imageable_type', MyParent::class)->pluck('filename');
            $parent = MyParent::findOrFail($id);

            if ($images) {
                foreach ($images as $image) {
                    $exists = Storage::disk('Attachments')->exists('Parents/' . $parent->National_ID_Father . '/' . $image);
                    if ($exists) {
                        Storage::disk('Attachments')->delete('Parents/' . $parent->National_ID_Father . '/' . $image);
                    }
                }
                $path = public_path('Attachments/Parents/' . $parent->National_ID_Father);
                if (is_dir($path)){
                    rmdir($path);
                }
            }

            Image::where('imageable_id', $id)->where('imageable_type', MyParent::class)->delete();
            $parent->delete();

            return redirect()->to('/Parents');
        } catch (Exception $e) {
            $this->catchError = $e->getMessage();
        }
    }
    public function clearForm()
    {
        $this->Email = '';
        $this->Password = '';
        $this->Name_Father_ar = '';
        $this->Job_Father_ar = '';
        $this->Job_Father_en = '';
        $this->Name_Father_en = '';
        $this->National_ID_Father = '';
        $this->Passport_ID_Father = '';
        $this->Phone_Father = '';
        $this->Nationality_Father_ID = '';
        $this->Blood_Type_Father_ID = '';
        $this->Address_Father = '';
        $this->Religion_Father_ID = '';

        $this->Name_Mother_ar = '';
        $this->Job_Mother_ar = '';
        $this->Job_Mother_en = '';
        $this->Name_Mother_en = '';
        $this->National_ID_Mother = '';
        $this->Passport_ID_Mother = '';
        $this->Phone_Mother = '';
        $this->Nationality_Mother_ID = '';
        $this->Blood_Type_Mother_ID = '';
        $this->Address_Mother = '';
        $this->Religion_Mother_ID = '';
    }
}
