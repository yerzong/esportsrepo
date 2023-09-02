<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Analyst;
use Illuminate\Http\Request;

class AnalystController extends Controller
{   
    public function craeteAnalyst(Request $request)
    {  
        $request->validate([
            'name' => 'required|unique:analyst',
            'user' => 'required|unique|unique:analyst',
            'date_of_birth' => 'required|unique:analyst',
        ]);
           
        $data = $request->all();
      
        $data = Analyst::create([
            'name' => $data['name'],
            'user' => $data['user'],  
            'rfc' => $data['rfc'],
            'date_of_birth' => $data['date_of_birth'],
            'image' => $this->saveImage($request, $data['phone'] , ''),
        ]);  
        
        $this->log('ANALYST', 'CREATE', $data);

        return redirect("analyst")->withSuccess('Great! You have Successfully analyst');
    }


    public function deleteAnalyst($id) 
    {
        $analyst = Analyst::find($id);
        $this->log('ANALYST', 'DELETE', $analyst);
        $analyst->delete();

        return redirect("analyst")->withSuccess('Successfully deleted!');
    }

}
