<?php

namespace App\Http\Controllers;
use App\CompanyDetails;


use Illuminate\Http\Request;

class CompanyDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company=CompanyDetails::all()->first();
        return view('admin.company.index', compact('company'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'company_name' => 'required',

       ]);
      if ($files = $request->file('company_logo')) {
       	// Define upload path
           $destinationPath = public_path('/company_images/'); // upload path
		// Upload Orginal Image           
           $companyImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $companyImage);

          // $insert['image'] = "$profileImage";
        // Save In Database
            $company = CompanyDetails::create($request->only('company_name', 'company_phone', 'company_notes','company_address'));  
			$company->company_logo="$companyImage";
            $company->save();
            return redirect('admin/companyDetails');

        }





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company=CompanyDetails::find($id);
        return view('admin.company.edit', compact('company'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company=CompanyDetails::find($id);
        $companyImage=$company->company_logo;
        $files = $request->file('company_logo');
        if($files != '')
        {
            $request->validate([
                'company_name'    =>  'required',
                'company_phone'     =>  'required',
                'company_address'     =>  'required',
                'company_notes'     =>  'required',

                'company_logo'         =>  'image|max:2048'
            ]);

            $destinationPath = public_path('/company_images/'); // upload path
            $companyImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $companyImage);
            }
        else
        {
            $request->validate([
                'company_name'    =>  'required',
                'company_phone'     =>  'required',
                'company_address'     =>  'required',
                'company_notes'     =>  'required',
            ]);
        }

        $form_data = array(
            'company_name'       =>   $request->company_name,
            'company_phone'        =>   $request->company_phone,
            'company_address'        =>   $request->company_address,
            'company_notes'        =>   $request->company_notes,

            'company_logo'            =>   $companyImage
        );
  
        $company->update($form_data);

        return redirect('admin/companyDetails');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
