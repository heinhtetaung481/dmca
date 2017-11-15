<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NoticesFormRequest;
use App\Provider;
use App\Notice;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Mail;
use App\Mail\Dmca;
use Illuminate\Support\Facades\Auth;

class NoticesController extends Controller
{   



    public function __construct(){

        $this->middleware('auth');


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all notices
        $notices = auth()->user()->notices()->where('content_removed', 0)->get();
        
        return view('notices.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $providers = Provider::pluck('name','id');

        return view('notices.create', compact('providers'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = session()->get('dmca');

        $template = request(['template']);

        $notice = $data + $template;


        $notice = Notice::create($notice);

        Mail::to($notice->provider->copyright_email)->send(new Dmca($notice));

        flash('Your DMCA Notice has been delivered')->success()->important();

        return redirect('notices');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Notice $notice)
    {

        $notice->content_removed = $request->content_removed? 1 : 0;

        $notice->save();

        return redirect()->back();
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


    public function confirm(NoticesFormRequest $request,Guard $auth)
    {

        $data = $request->all()+[

            'name' => $auth->user()->name,
            'email' => $auth->user()->email
        ];


        session()->flash('dmca', $request->all()+ ['user_id' => $auth->user()->id]);

        $template = view()->file('../resources/views/templates/dmca.blade.php', $data);

        return view('notices.confirm', compact('template'));

    }
}
