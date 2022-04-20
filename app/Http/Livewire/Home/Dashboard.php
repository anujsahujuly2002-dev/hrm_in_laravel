<?php

namespace App\Http\Livewire\Home;

use App\Models\Appointment;
use App\Models\Checkup;
use App\Models\Medicine;
use App\Models\Patient;
use App\Models\Payments;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['findP',];

    public $todaysApo, $tomorrowApo, $dayafterApo;
    public $todayIncome, $weekIncome, $monthIncome, $yearIncome;
    public $doctorCount,$checkupCount, $patientCount, $medicinesCount;
    public $contact_of_patient, $name_of_patient, $gender_of_patient, $address_of_patient, $dob_of_patient,
           $date_of_appointment, $age_of_patient, $doc_for_appointment;
    public $patients,$patientData;

    public function findP()
    {
        if($this->contact_of_patient)
        {
            $this->patients = 'App\Models\Patient'::where('contact', 'like', '%' . $this->contact_of_patient . '%')->orderBy('name', 'ASC')->get();
        }
        else
        {
            $this->patients=null;
            $this->patientData=null;
            $this->contact_of_patient ='';
            $this->name_of_patient ='';
            $this->gender_of_patient ='';
            $this->address_of_patient ='';
            $this->dob_of_patient ='';
            $this->date_of_appointment ='';
            $this->age_of_patient = '';
            $this->doc_for_appointment = '';
        }
    }

    public function getAge()
    {
        $this->age_of_patient = Carbon::parse($this->dob_of_patient)->age;
    }

    public function selectP($PID)
    {
        $this->patientData=Patient::find($PID);
        $this->contact_of_patient=$this->patientData->contact;
        $this->name_of_patient=$this->patientData->name;
        $this->gender_of_patient=$this->patientData->gender;
        $this->address_of_patient=$this->patientData->address;
        $this->dob_of_patient=$this->patientData->dob;
        $this->date_of_appointment=Carbon::now();
        $this->age_of_patient = Carbon::parse($this->dob_of_patient)->age;
        $this->patients=[];
    }

    public function newAppointment()
    {
        if($this->patientData)
        {
            Appointment::create([
                'user_id' => Auth::user()->id,
                'patient_id' => $this->patientData->id,
                'doctor_id'=>$this->doc_for_appointment,
                'date' => $this->date_of_appointment,
                'status' => 'booked',
            ]);

            $this->patients = null;
            $this->patientData = null;
            $this->contact_of_patient = '';
            $this->name_of_patient = '';
            $this->gender_of_patient = '';
            $this->address_of_patient = '';
            $this->dob_of_patient = '';
            $this->date_of_appointment = '';
            $this->age_of_patient = '';
            $this->doc_for_appointment = '';
            session()->flash('success', 'Appointment Booked.');
        }
        else
        {
            $this->validate([
                'name_of_patient' => 'required',
                'address_of_patient' => 'required',
                'gender_of_patient' => 'required',
                'dob_of_patient' => 'required',
                'age_of_patient' => 'required',
                'contact_of_patient' => 'required|numeric',
            ]);

            $pat = Patient::create([
                'name' => ucwords($this->name_of_patient),
                'address' => ucwords($this->address_of_patient),
                'gender' => $this->gender_of_patient,
                'contact' => $this->contact_of_patient,
                'email' => '',
                'dob' => Carbon::parse($this->dob_of_patient)->format('Y-m-d'),
                'allergy' => '',
                'image' => '',
                'balance' =>0,
            ]);

            Appointment::create([
                'user_id' => Auth::user()->id,
                'patient_id' => $pat->id,
                'doctor_id' => $this->doc_for_appointment,
                'date' => $this->date_of_appointment,
                'status' => 'booked',
            ]);

            $this->patients = null;
            $this->patientData = null;
            $this->contact_of_patient = '';
            $this->name_of_patient = '';
            $this->gender_of_patient = '';
            $this->address_of_patient = '';
            $this->dob_of_patient = '';
            $this->date_of_appointment = '';
            $this->age_of_patient = '';
            $this->doc_for_appointment='';

            session()->flash('success', 'Appointment Booked.');
        }
    }

    public function mount()
    {
        if(Auth::user()->role == 6)
        {
            $this->todaysApo = Appointment::where('date', Carbon::parse(Carbon::now())->format('Y-m-d'))->get();
            $this->tomorrowApo = Appointment::where('date', Carbon::parse(Carbon::now()->addDays(1))->format('Y-m-d'))->get();
            $this->dayafterApo = Appointment::where('date', Carbon::parse(Carbon::now()->addDays(2))->format('Y-m-d'))->get();
        }

        if(Auth::user()->role == 1)
        {
            $this->doctorCount = User::where('role', '2')->count();
            $this->checkupCount = Checkup::all()->count();
            $this->patientCount = Patient::all()->count();
            $this->medicinesCount = Medicine::all()->count();

            $this->todayIncome = Payments::where('date', Carbon::now()->format('Y-m-d'))->sum('amount');
            $this->weekIncome = Payments::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount');
            $this->monthIncome = Payments::whereMonth('date', date('m'))->whereYear('date', date('Y'))->sum('amount');
            $this->yearIncome = Payments::whereYear('date', date('Y'))->sum('amount');
        }
    }

    public function cancelApp($appId)
    {
        $app = Appointment::find($appId);
        $app->status='Cancelled';
        $app->Save();
        session()->flash('error', 'Appointment Cancelled.');
    }

    public function createCheckup($appId)
    {
        $app=Appointment::find($appId);
        $case_no=0;
        $last_checkup=Checkup::where('case_year', Carbon::now()->format('y'))->latest()->first();
        if ($last_checkup) {
            $case_no = $last_checkup->case_no + 1;
        } else {
            $case_no = 1;
        }
        $case_paper_no = Carbon::now()->format('y') . '/' . $app->patient_id . str_pad($case_no, 4, '0', STR_PAD_LEFT);

        Checkup::create([
            'patient_id' => $app->patient_id,
            'age' => Carbon::parse($app->patients->dob)->age,
            'date' => Carbon::now(),
            'case_year' => Carbon::now()->format('y'),
            'case_no' => $case_no,
            'case_year_full' => Carbon::now()->format('Y'),
            'case_paper_no' => $case_paper_no,
            'symptoms' => '',
            'history' => '',
            'history_details' => '',
            'consulting_charges' => 0,
            'medicine_charges' => 0,
            'total_charges' => 0,
            'medicine_days' => 0,
            'next_appointment' => Carbon::now(),
            'pay_mode' => 'Cash',
            'user_id' => Auth::user()->id,
        ]);
        $app->status='Done';
        $app->save();
        return redirect()->route('patient.checkup',['active_tab'=>2]);
    }

    public function render()
    {
        $data = Appointment::where('status','Booked')->paginate(10);
        return view('livewire.home.dashboard', ['data' => $data]);
    }
}
