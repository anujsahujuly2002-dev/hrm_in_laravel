<?php

namespace App\Http\Livewire\Patient;

use App\Models\Appointment;
use App\Models\Checkup as ModelsCheckup;
use App\Models\CheckupAttach;
use App\Models\CheckupItem;
use App\Models\CheckupTest;
use App\Models\Disease;
use App\Models\DiseaseMedicine;
use App\Models\Medicine;
use App\Models\MedicineRate;
use App\Models\Patient;
use App\Models\Test;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Checkup extends Component
{
    use WithFileUploads;

    protected $listeners = ['addMed', 'updateQty', 'updateDoses'];

    public $checkup_date, $patients = [], $pageid = 0, $patient_name, $diseases = [],
           $medicines = [],$disease, $medicine, $tests = [], $medList = [], $checkupItemList, $checkupTestList=[];

    public $active_tab = 1;

    public $checkupData;

    public $patient_id, $patient_data = null, $age, $patient_allergy, $address;

    public $case_no, $case_year, $case_paper_no;

    public $symptoms,$history, $history_details, $consulting_charges, $medicine_charges,
           $total_charges, $medicine_for_days, $next_appointment, $test,
           $payment_mode, $attach_report = [];

    public $name_of_patient, $address_of_patient, $gender_of_patient, $contact_of_patient,
           $email_of_patient, $dob_of_patient, $age_of_patient, $allergy_of_patient, $image_of_patient,
           $balance_of_patient;


    public function addMed($medId)
    {
        $med=Medicine::find($medId);
        if($med->stock==0)
        {
            session()->flash('error', 'Stock Not Available.');
        }
        else
        {
            $this->medList[]=$med;
        }
    }

    public function delMed($k)
    {
        unset($this->medList[$k]);
    }

    public function delMedItem($ciId)
    {
        if($this->checkupData)
        {
        $med=CheckupItem::find($ciId);
        $this->checkupData->medicine_charges = $this->checkupData->medicine_charges - ($med->meds->price * $med->qty);
        $this->checkupData->save();
        $med->delete();
        $this->getCheckupData();
        }
    }

    public function updateQty($qty,$cmiId)
    {
        if($this->checkupData)
        {
        $cmiData= $this->checkupItemList->find($cmiId);

        $med = Medicine::find($cmiData->medicine_id);
        //dd($qty.'-'.$med->qty);

            if($qty <= $med->stock && is_numeric($qty))
            {
                $this->checkupData->medicine_charges = $this->checkupData->medicine_charges - ($med->price * $cmiData->qty);
                $this->checkupData->medicine_charges = $this->checkupData->medicine_charges + ($med->price * $qty);
                $this->checkupData->save();
                $cmiData->qty = $qty;
                $cmiData->save();
                $this->getCheckupData();
            }
            else
            {
                session()->flash('error', 'Pleas enter a valid number');
            }
        }
    }

    public function updateDoses($doses, $cmiId)
    {
        $cmiData = $this->checkupItemList->find($cmiId);
        $cmiData->doses = $doses;
        $cmiData->save();
        $this->getCheckupData();
    }

    public function checkdata()
    {
        dd($this->checkupData);
    }

    public function addMedList()
    {

        $this->validate([
            'disease' => 'required',
        ]);
        if($this->checkupData)
        {
        foreach ($this->medList as $key => $item)  {
            CheckupItem::create([
                'patient_id' => $this->patient_id,
                'checkup_id' => $this->checkupData->id,
                'disease_id' => $this->disease,
                'medicine_id'=>$item['id'],
                'qty' => '1',
                'unit' => $item['unit'],
                'doses' =>'',
                'date'=>$this->checkup_date,
            ]);
            $med=Medicine::find($item['id']);
            $this->checkupData->medicine_charges= $this->checkupData->medicine_charges+$med->price;
            $this->checkupData->save();
            $this->getCheckupData();
            //$this->checkupData = ModelsCheckup::where('status', 'Active')->where('user_id', Auth::user()->id)->first();
        }
        }
        $this->medList=[];

        session()->flash('success', 'Meds added.');
    }

    public function patTab()
    {
        $this->active_tab = 1;
    }

    public function caseTab()
    {

        $this->validate([
            'patient_name' => 'required',
        ]);
        if ($this->checkupData == null) {
            $this->checkupData = ModelsCheckup::create([
                'patient_id' => $this->patient_name,
                'age' => $this->age,
                'date' => $this->checkup_date,
                'case_year' => Carbon::now()->format('y'),
                'case_no' => $this->case_no,
                'case_year_full' => Carbon::now()->format('Y'),
                'case_paper_no' => $this->case_paper_no,
                'symptoms'=>'',
                'history' => '',
                'history_details' => '',
                'consulting_charges' => 0,
                'medicine_charges' => 0,
                'total_charges' => 0,
                'medicine_days' => 0,
                'next_appointment' => $this->checkup_date,
                'pay_mode' => 'Cash',
                'user_id' => Auth::user()->id,
            ]);
        }
        $this->active_tab = 2;
    }

    public function medTab()
    {
        $this->validate([
            'patient_name' => 'required',
        ]);

        if($this->checkupData)
        {
            $this->checkupData->symptoms = $this->symptoms.'';
            $this->checkupData->history = $this->history.'';
            $this->checkupData->history_details = $this->history_details.'';
            $this->checkupData->save();
        }
        $this->active_tab = 3;
    }

    public function saveconCharge()
    {
        if ($this->checkupData) {
        $this->checkupData->consulting_charges = $this->consulting_charges;
        $this->checkupData->save();
        }
        $this->getCheckupData();
    }

    public function saveMFD()
    {
        if ($this->checkupData) {
        $this->checkupData->medicine_days = $this->medicine_for_days;
        $this->checkupData->next_appointment = Carbon::parse($this->checkupData->date)->addDays($this->medicine_for_days);
        $this->checkupData->save();
        }
        $this->getCheckupData();
    }

    public function saveCheckup()
    {
        if($this->checkupData)
        {
            $this->checkupData->status = 'Pending';
            $this->checkupData->save();

            if($this->checkupData->next_appointment!=''|| $this->checkupData->next_appointment != null)
            {
                Appointment::create([
                    'user_id' => Auth::user()->id,
                    'checkup_id' => $this->checkupData->id,
                    'patient_id' => $this->patient_id,
                    'date' => $this->checkupData->next_appointment,
                    'status' => 'booked',
                ]);
            }

            if(count($this->attach_report) > 0){
                foreach ($this->attach_report as $report) {
                    $ext = $report->extension();
                    $report_name = time() . '.' . $ext;
                    $report->storeAs('public/checkup/reports/', $report_name);

                    CheckupAttach::create([
                        'checkup_id' => $this->checkupData->id,
                        'file' => $report_name
                    ]);
                }
            }

            foreach ($this->checkupItemList as $key => $item) {
                $med = Medicine::find($item->medicine_id);
                $medStock=MedicineRate::where('status','Active')->where('medicine_id',$med->id)->first();
                if($medStock->remain_stock> $item->qty){
                    $medStock->remain_stock= $medStock->remain_stock-$item->qty;
                    $medStock->sold_stock = $medStock->sold_stock + $item->qty;
                    $medStock->save();
                }

                if ($medStock->remain_stock < $item->qty) {
                    $newStock= MedicineRate::where('status', 'Pending')->where('medicine_id', $med->id)->first();
                    $extraQty = $item->qty - $medStock->remain_stock;
                    $medStock->sold_stock = $medStock->sold_stock + $medStock->remain_stock;
                    $medStock->remain_stock= $medStock->remain_stock- $medStock->remain_stock;
                    $medStock->status='Sold';
                    $medStock->save();
                    $newStock->remain_stock= $newStock->remain_stock-$extraQty;
                    $newStock->sold_stock = $newStock->sold_stock + $extraQty;
                    $newStock->status='Active';
                    $newStock->save();
                }

                if ($medStock->remain_stock == $item->qty) {
                    $medStock->remain_stock = $medStock->remain_stock - $item->qty;
                    $medStock->sold_stock = $medStock->sold_stock + $item->qty;
                    $medStock->status = 'Sold';
                    $medStock->save();
                    $newStock = MedicineRate::where('status', 'Pending')->where('medicine_id', $med->id)->first();
                    $newStock->status = 'Active';
                    $newStock->save();
                }

                $med->stock = $med->stock - $item->qty;
                $med->save();
            }
        }
        $this->getCheckupData();
        $this->active_tab = 1;
        session()->flash('success', 'Checkup Saved.');
    }

    public function addTest($testId)
    {
        if($this->checkupData)
        {
            CheckupTest::create([
                'checkup_id' => $this->checkupData->id,
                'test_id'=>$testId,
                'patient_id'=>$this->patient_id,
            ]);
        }
        $this->getCheckupData();
    }

    public function delTest($testId)
    {
        CheckupTest::find($testId)->delete();
        $this->getCheckupData();
    }

    public function getCheckupData()
    {
       $this->checkupData = ModelsCheckup::where('status', 'Active')->where('user_id', Auth::user()->id)->first();
        if ($this->checkupData) {
            $this->checkupData->total_charges = $this->checkupData->consulting_charges + $this->checkupData->medicine_charges;
            $this->checkupData->save();

            $this->checkup_date = $this->checkupData->date;
            $this->checkupItemList = CheckupItem::where('checkup_id', $this->checkupData->id)->get();
            $this->checkupTestList = CheckupTest::where('checkup_id', $this->checkupData->id)->get();
            $this->patient_name = $this->checkupData->patient_id;
            $this->patient_id = $this->checkupData->patient_id;
            $this->age = $this->checkupData->age;
            $this->symptoms = $this->checkupData->symptoms;
            $this->history = $this->checkupData->history;
            $this->history_details = $this->checkupData->history_details;
            $this->consulting_charges = $this->checkupData->consulting_charges;
            $this->medicine_charges = $this->checkupData->medicine_charges;
            $this->total_charges = $this->checkupData->total_charges;
            $this->medicine_for_days = $this->checkupData->medicine_days;
            $this->next_appointment = $this->checkupData->next_appointment;
            $this->payment_mode = $this->checkupData->pay_mode;
        }
        else
        {
            $this->checkupData=null;
            $this->checkup_date =Carbon::parse(Carbon::now())->format('Y-m-d');
            $this->checkupItemList =[];
            $this->patient_name ='';
            $this->patient_id ='';
            $this->age ='';
            $this->address='';
            $this->allergy_of_patient='';
            $this->symptoms ='';
            $this->history ='';
            $this->history_details ='';
            $this->consulting_charges ='0';
            $this->medicine_charges ='0';
            $this->total_charges ='0';
            $this->medicine_for_days ='0';
            $this->next_appointment ='';
            $this->payment_mode ='Select';
        }
        $this->tests = Test::all()->sortBy('name');
    }

    public function mount()
    {
        $this->checkup_date = Carbon::parse(Carbon::now())->format('Y-m-d');
        $this->patients = Patient::all()->sortBy('name');
        $this->diseases = Disease::all()->sortBy('name');
        $this->checkupData=ModelsCheckup::where('status','Active')->where('user_id',Auth::user()->id)->first();
        if($this->checkupData)
        {
            $this->checkupItemList = CheckupItem::where('checkup_id', $this->checkupData->id)->get();
            $this->checkupTestList = CheckupTest::where('checkup_id', $this->checkupData->id)->get();
            $this->patient_name=$this->checkupData->patient_id;
            $this->patient_id = $this->checkupData->patient_id;
            $this->age = $this->checkupData->age;
            $this->symptoms = $this->checkupData->symptoms;
            $this->history=$this->checkupData->history;
            $this->history_details = $this->checkupData->history_details;
            $this->consulting_charges=$this->checkupData->consulting_charges;
            $this->medicine_charges=$this->checkupData->medicine_charges;
            $this->total_charges=$this->checkupData->total_charges;
            $this->medicine_for_days=$this->checkupData->medicine_days;
            $this->next_appointment=$this->checkupData->next_appointment;
            $this->payment_mode = $this->checkupData->pay_mode;
            $this->getPatientAge();
            $this->checkup_date = $this->checkupData->date;
        }
        // $this->medicines = Medicine::all()->sortBy('name');

        $this->tests = Test::all()->sortBy('name');
    }

    public function getMeds()
    {
        $this->medicines = DiseaseMedicine::where('disease', $this->disease)->get();
        //dd($this->medicines);
        $this->active_tab = 3;
    }

    public function changePage($id)
    {
        $this->pageid = $id;
    }


    public function getAge()
    {
        $this->age_of_patient = Carbon::parse($this->dob_of_patient)->age;
    }

    public function getPatientAge()
    {
        if($this->patient_name) {
            $this->patient_id = $this->patient_name;
            $this->patient_data = Patient::find($this->patient_name);
            $this->age = Carbon::parse($this->patient_data->dob)->age;
            $this->patient_allergy = $this->patient_data->allergy;
            $this->address = $this->patient_data->address;

            $this->case_year = Carbon::parse(Carbon::now())->format('y');
            $last_checkup = ModelsCheckup::where('case_year', $this->case_year)->latest()->first();
            if ($last_checkup) {
                $this->case_no = $last_checkup->case_no + 1;
            } else {
                $this->case_no = 1;
            }
            $this->case_paper_no = $this->case_year . '/' . $this->patient_id . str_pad($this->case_no, 4, '0', STR_PAD_LEFT);
        }
        else{
            $this->age = '';
            $this->patient_allergy = '';
            $this->address = '';
        }
        //$this->active_tab = 1;
    }

    public function createPatient()
    {
        $this->validate([
            'name_of_patient' => 'required',
            'address_of_patient' => 'required',
            'gender_of_patient' => 'required',
            'image_of_patient' => 'nullable|image|mimes:png,jpg',
            'email_of_patient' => 'nullable|email',
            'dob_of_patient' => 'required',
            'age_of_patient' => 'required',
            'contact_of_patient' => 'required|numeric',
            'balance_of_patient' => 'required|numeric|min:0',
        ]);

        $imagename = 'default.png';
        if($this->image_of_patient){
            $imagename = time() . '.png';
            $this->image_of_patient->storeAs('public/patients', $imagename);
        }

        $pat = Patient::create([
            'name' => ucwords($this->name_of_patient),
            'address' => ucwords($this->address_of_patient),
            'gender' => $this->gender_of_patient,
            'contact' => $this->contact_of_patient,
            'email' => strtolower($this->email_of_patient),
            'dob' => Carbon::parse($this->dob_of_patient)->format('Y-m-d'),
            'allergy' => ucfirst($this->allergy_of_patient),
            'image' => $imagename,
            'balance' => $this->balance_of_patient,
        ]);

        session()->flash('success', 'Patient added.');
        $this->patients = Patient::all()->sortBy('name');
        $this->pageid = 0;
        $this->patient_name = $pat->id;
        $this->getPatientAge();
    }

    public function render()
    {
        return view('livewire.patient.checkup');
    }
}
