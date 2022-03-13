<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dealer;
use App\Models\District;
use App\Models\Country;
use App\Http\Requests;
use App\Models\WebmasterSection;
use Auth;
use File;
use Helper;
use Illuminate\Config;
use Illuminate\Http\Request;
use Redirect;

class DealersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (!@Auth::user()->permissionsGroup->newsletter_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    /**
     * Display a listing of the resource.
     * int $group_id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $small_date = Dealer::orderby('created_at','ASC')->first()->created_at;
        $large_date = Dealer::orderby('created_at','DESC')->first()->created_at;
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END
        //List of Countries
        $Districts = District::where('status',1)->get();
        $Thana= Country::orderby('title_' . @Helper::currentLanguage()->code, 'asc')->get();
        $Dealers = Dealer::orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));
        $AllDealersCount = Dealer::count();
        $search_word = "";

        return view("dashboard.dealers.list",
            compact("Dealers", "GeneralWebmasterSections", "Districts","Thana",
                 "AllDealersCount", "search_word", "small_date","large_date"));
    }



    public function get_dealer_data(Request $request)
    {
        if ($request['FromDate'])
        {
            $DateFrom = $request['FromDate'];
            $ToDate = $request['ToDate'];
        }
        else {
            $DateFrom = date('Y-m-01');
            $ToDate =  date('Y-m-d');
        }
        //dd($ToDate);
        $Dealers = Dealer::all();

        return view('dashboard.dealers.get_dealers', compact('Dealers','DateFrom','ToDate'));
    }

    /**
     * Search resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END
        //List of Countries
        $Countries = Country::orderby('title_' . @Helper::currentLanguage()->code, 'asc')->get();
        if ($request->q != "") {
            //find Dealers
            $Dealers = Dealer::where('first_name', 'like', '%' . $request->q . '%')
                ->orwhere('last_name', 'like', '%' . $request->q . '%')
                ->orwhere('company', 'like', '%' . $request->q . '%')
                ->orwhere('city', 'like', '%' . $request->q . '%')
                ->orwhere('notes', 'like', '%' . $request->q . '%')
                ->orwhere('phone', '=', $request->q)
                ->orwhere('email', '=', $request->q)
                ->orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));
        } else {
            //List of all dealers
            $Dealers = Dealer::orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));
        }

        $AllDealersCount = Dealer::count();

        $search_word = $request->q;

        return view("dashboard.dealers.list",
            compact("Dealers", "GeneralWebmasterSections", "Countries", "AllDealersCount", "search_word"));
    }

    public function addDealer()
    {
        //dd("dd");

        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END
        $Districts = District::where('status',1)->get();
        $Thana= Country::orderby('title_' . @Helper::currentLanguage()->code, 'asc')->get();

        return view("dashboard.dealers.list_add",
            compact("GeneralWebmasterSections", "Districts","Thana"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->add_status) {
            return Redirect::to(route('NoPermission'))->send();
        }

        //
        $this->validate($request, [
            'first_name' => 'required'
            
        ]);

        $Dealer = new Dealer;
        $Dealer->first_name = $request->first_name;
        $Dealer->last_name = $request->last_name;
        $Dealer->company = $request->company;
        $Dealer->email = $request->email;
        $Dealer->phone = $request->phone;
        $Dealer->address = $request->address;
        $Dealer->created_by = Auth::user()->id;
        $Dealer->save();

        return redirect()->action('Dashboard\DealersController@index');
    }

    public function getUploadPath()
    {
        return $this->uploadPath;
    }

    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = Config::get('app.APP_URL') . $uploadPath;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
        $DealerToEdit = Dealer::find($id);
        if (!empty($DealerToEdit)) {
            return redirect()->action('Dashboard\DealersController@index', $DealerToEdit->group_id)->with('DealerToEdit',
                $DealerToEdit);
        } else {
            return redirect()->action('Dashboard\DealersController@index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function editGroup($id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->edit_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        if (@Auth::user()->permissionsGroup->view_status) {
            $EditDealersGroup = DealersGroup::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $EditDealersGroup = DealersGroup::find($id);
        }
        if (!empty($EditDealersGroup)) {
            return redirect()->action('Dashboard\DealersController@index')->with('EditDealersGroup', $EditDealersGroup);
        } else {
            return redirect()->action('Dashboard\DealersController@index');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request->all());
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->edit_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        if (@Auth::user()->permissionsGroup->view_status) {
            $Dealer = Dealer::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $Dealer = Dealer::find($id);
        }
        if (!empty($Dealer)) {


            $this->validate($request, [
                'email' => 'email|required',
                'file' => 'mimes:png,jpeg,jpg,gif,svg'
            ]);


            // Start of Upload Files
            $formFileName = "file";
            $fileFinalName_ar = "";
            if ($request->$formFileName != "") {
                $fileFinalName_ar = time() . rand(1111,
                        9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
                $path = $this->getUploadPath();
                $request->file($formFileName)->move($path, $fileFinalName_ar);
            }
            // End of Upload Files


            $Dealer->first_name = $request->first_name;
            $Dealer->last_name = $request->last_name;
            $Dealer->company = $request->company;
            $Dealer->email = $request->email;
            $Dealer->password = $request->password;
            $Dealer->phone = $request->phone;
            $Dealer->country_id = $request->country_id;
            $Dealer->city = $request->city;
            $Dealer->address = $request->address;
            $Dealer->address = $request->address;
            $Dealer->notes = $request->notes;

            if ($fileFinalName_ar != "") {
                // Delete a Dealer file
                if ($Dealer->photo != "") {
                    File::delete($this->getUploadPath() . $Dealer->photo);
                }

                $Dealer->photo = $fileFinalName_ar;
            }

            $Dealer->status = $request->status;
            $Dealer->updated_by = Auth::user()->id;
            $Dealer->save();
            return redirect()->action('Dashboard\DealersController@index')->with('DealerToEdit', $Dealer)->with('doneMessage2',
                __('backend.saveDone'));
        } else {
            return redirect()->action('Dashboard\DealersController@index');
        }
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->delete_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        if (@Auth::user()->permissionsGroup->view_status) {
            $Dealer = Dealer::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $Dealer = Dealer::find($id);
        }
        if (!empty($Dealer)) {
            // Delete a Dealer file
            if ($Dealer->photo != "") {
                File::delete($this->getUploadPath() . $Dealer->photo);
            }

            $Dealer->delete();
        }
        return redirect()->action('Dashboard\DealersController@index');

    }

    public function destroyGroup($id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->delete_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        if (@Auth::user()->permissionsGroup->view_status) {
            $DealersGroup = DealersGroup::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $DealersGroup = DealersGroup::find($id);
        }
        if (!empty($DealersGroup)) {
            $DealersGroup->delete();
            return redirect()->action('Dashboard\DealersController@index');
        } else {
            return redirect()->action('Dashboard\DealersController@index');
        }
    }

    /**
     * Update all selected resources in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param buttonNames , array $ids[]
     * @return \Illuminate\Http\Response
     */
    public function updateAll(Request $request)
    {
        //
        if ($request->ids != "") {
            if ($request->action == "activate") {
                Dealer::wherein('id', $request->ids)
                    ->update(['status' => 1]);

            } elseif ($request->action == "block") {
                Dealer::wherein('id', $request->ids)
                    ->update(['status' => 0]);

            } elseif ($request->action == "delete") {
                // Check Permissions
                if (!@Auth::user()->permissionsGroup->delete_status) {
                    return Redirect::to(route('NoPermission'))->send();
                }
                // Delete Dealers file
                $Dealers = Dealer::wherein('id', $request->ids)->get();
                foreach ($Dealers as $Dealer) {
                    if ($Dealer->photo != "") {
                        File::delete($this->getUploadPath() . $Dealer->photo);
                    }
                }

                Dealer::wherein('id', $request->ids)
                    ->delete();

            }
        }
        return redirect()->action('Dashboard\DealersController@index')->with('doneMessage', __('backend.saveDone'));
    }


}
