<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//using raw SQL
Route::get('/insert', function () {
    DB::insert('insert into students(id, name, date_of_birth, gpa, advisor) values(?,?,?,?,?)',["2","Jennie","20.05.2000","3","Zhangir Rayev"]);
});

Route::get('/select',function(){  
    $results=DB::select('select * from students where id=?',[1]);  
    foreach($results as $students)  
    {  
    echo "id is :".$students->id;  
    echo "<br>";  
    echo "name is:".$students->name; 
    echo "<br>"; 
    echo "date of birth is:".$students->date_of_birth;
    echo "<br>"; 
    echo "gpa is:".$students->gpa;
    echo "<br>";
    echo "advisor is:".$students->advisor;  
    }  
    });  

 Route::get('/update', function(){  
    $updated=DB::update('update students set name="Rose" where id=?',[1]);  
     return $updated;  
    }); 

Route::get('/delete',function(){  
    $deleted=DB::delete('delete from students where id=?',[2]);  
     return $deleted;  
    }); 


//using Model Student
Route::get('/find',function(){  
    $students=Student::where('id',2)->first();  
    return $students;  
    });

Route::get('/add',function(){  
    $students=new Student; 
    $students->id='3';  
    $students->name='Nini';  
    $students->date_of_birth='08.06.2002';
    $students->gpa='3.5'; 
    $students->advisor='John Kenedi';   
    $students->save();  
    });
    
Route::get('/basicupdate',function(){  
        $students=Student::find(3);  
        $students->name='Juilee';  
        $students->advisor='Greek Sweet';  
        $students->save();  
    });
    
Route::get('/delete2',function(){  
    Student::where('id',3)->delete();  
}); 
