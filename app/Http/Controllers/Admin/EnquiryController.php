<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Enquiry;
use App\Http\Requests\EnquiryValidator;
use App\Notifications\EnquiryNotification;
use App\Admin\Admin;
use Auth;
use Session;
use Thread;

class EnquiryController extends Controller
{
    protected $category = null;
    protected $enquiry = null;

    public function __construct(Enquiry $enquiry, Category $category)
    {
        $this->category = $category;
        $this->enquiry = $enquiry;
    }

    public function index()
    {
        $enquiry = $this->enquiry->get();

        return view('Admin.Enquiry.Index')->with('enquiry', $enquiry);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->category->get();
        return view('Admin.Enquiry.Add')->with('category', $category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnquiryValidator $request, Admin $thread)
    {
        $data = $request->all();
//        dd($data);
        if ($request->responded_through) {
            $responded_through = implode(',', $request->responded_through);
            $data['responded_through'] = $responded_through;
        }
        $this->enquiry->fill($data);
        $success = $this->enquiry->save();
        if ($success) {
            $admin = Admin::all();
            $thread = $this->enquiry;
            foreach ($admin as $admin)
//                $notification=EnquiryNotification($request->all());
                $admin->notify(new \App\Notifications\EnquiryNotification($thread));
            return redirect()->route('Enquiry.index')->with('success', 'Enquiry Created Succesfully');
        } else
            return redirect()->route('Enquiry.index')->with('Error', 'Sorry! Enquiry Creation Failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $category = $this->category->get();
        $enquiry = $this->enquiry->find($id);
        if ($enquiry->Category_id) {
            $cat = $enquiry->Category_Enquiry->Name;
        }
        if (empty($enquiry)) {
            return redirect()->back()->with('Error', 'Enquiry Not Found');
        } elseif ($enquiry->Category_id) {
            return view('Admin.Enquiry.Update')->with('enquiry', $enquiry)->with('category', $category)->with('cat', $cat);
        } else {
            return view('Admin.Enquiry.Update')->with('enquiry', $enquiry)->with('category', $category);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EnquiryValidator $request, $id)
    {
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $this->enquiry = $this->enquiry->find($id);
        $data = $request->all();
        if ($request->responded_through) {
            $responded_through = implode(',', $request->responded_through);
            $data['responded_through'] = $responded_through;
        }
        $this->enquiry->fill($data);
        $success = $this->enquiry->save();
        $admin = Admin::all();
        foreach ($admin as $admin)
            $admin->notify(new \App\Notifications\EnquiryUpdateNotification());
        return redirect()->route('Enquiry.index')->with('success', 'Enquiry Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $enquiry = $this->enquiry->find($id);
        if (!$enquiry) {
            return redirect()->back()->with('Error', 'Enquiry Not Found');
        }
        $success = $enquiry->delete();
        if ($success) {
            return redirect()->route('Enquiry.index')->with('success', 'Enquiry Deleted Successfully');
        } else {
            return redirect()->route('Enquiry.index')->with('Error', 'Sorry! Enquiry Not Deleted');
        }

    }

    public function Detail($id)
    {
        $enquiry = $this->enquiry->find($id);
        return view('Admin.Enquiry.Detail')->with('enquiry', $enquiry);
    }
}
