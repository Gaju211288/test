<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeDetailsController extends Controller
{
    //
    public function index(){
            
        $empDatas = Employee::get();
       
        return view('employee', ['empDetails' => $empDatas]);
    }

    public function userDetails(Request $request){

        if($request->all()){

            $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // Add more fields as needed
            ]);
           

            $employee = new Employee();
            $employee->firstName = isset($request->firstName) ? $request->firstName : '';
            $employee->lastName = isset($request->lastName) ? $request->lastName : '';
            $employee->email = isset($request->email) ? $request->email : '';
            $employee->mobile = isset($request->mobile) ? $request->mobile :'';
            $employee->save();

            $empDatas = Employee::orderBy('id', 'desc')->get();

            //$table_view =  view("/employeeList",['empDatas' => $empDatas])->render();
             $table_view =  view("/employee", ['empDatas' => $empDatas])->render();
            return response()->json(['succes' => true, 'empDatas' =>$table_view]);

        }else{
            return view('employee');
        } 
    }

    public function payment(Request $request){

        return view('/checkout');
    }

    public function makePayment(Request $request){




         \Stripe\Stripe::setApiKey('sk_test_51Od9aGAp1cH9DYZxD9VVo2ii7cLPO4OUOx0r696PCtM78Z9ZP3nGtqcoyLUbHYfue6D3WJu7DvFTQQfWjTY1srpS00MY15xgFg');

        \Stripe\Stripe::setVerifySslCerts(false);

        $charge = \Stripe\Charge::create([
          'source' => $_POST['stripeToken'],
          'description' => "10 cucumbers from Roger's Farm",
          'amount' => 100,
          'currency' => 'usd',
        
        ],);

        


    }
}



// Step 1:- Install your laravel project.
//          laravel new excellara

// Step 2:- composer require maatwebsite/excel

// Install the Laravel excel package by running the composer command as above.

// Step 3:- php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config

// To publish the config file, run the vendor publish command as above. Running this command will 
// create a new config file named and located in the config/excel.php directory.

// Step 4:- Create Export Class
         
// php artisan make:export UsersExport --model=User

// Step 5:- Paste the below code in your file

// <?php

// namespace App\Exports;

// use App\Models\User;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
// use Maatwebsite\Excel\Concerns\WithHeadings;

// class UsersExport implements FromCollection, WithCustomCsvSettings, WithHeadings
// {
//     public function getCsvSettings(): array
//     {
//         return [
//             'delimiter' => ','
//         ];
//     }

//     public function headings(): array
//     {
//         return ["Name", "Email"];
//     }

//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return User::select('name','email')->get();
//     }
// } 

// Step 6:- Create Routes

// Route::get('/export-csv', [UserController::class,'export']);

// Step 7:- Create cotroller and paster below code like:- UserController

// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Users;
// use App\Exports\UsersExport;
// use Maatwebsite\Excel\Facades\Excel;

// class UserController extends Controller
// {
//     public function export() 
//     {
//         return Excel::download(new UsersExport, 'users.csv');
//     }
// }