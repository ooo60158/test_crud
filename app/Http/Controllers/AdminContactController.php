<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $contacts = [
        //                 [
        //                     'name'    => 'Ken Lin',
        //                     'phone'   => '0988-123456',
        //                     'email'   => 'ken@example.com',
        //                     'message' => '請問你們的網站建置服務支援手機嗎？那 iPad Pro 有沒有支援？謝謝！',
        //                 ],
        //                 [
        //                     'name'    => '王小姐',
        //                     'phone'   => '02-82237899',
        //                     'email'   => 'wang@example.com',
        //                     'message' => '如果我要做一個含線上刷卡的購物車網站要多少錢？',
        //                 ],
        //                 [
        //                     'name'    => '范先生',
        //                     'phone'   => '0912-999666',
        //                     'email'   => 'sir@example.com',
        //                     'message' => '我們公司缺人啊，有沒有興趣來我們公司上班啊？薪水可談！',
        //                 ],
        //             ];
                    
                    $contactList = \App\Contact :: all();
/*                     $list = $contactList->map(function ($contact){
                        return [
                            'id'      => $contact['id'],
                            'name'    => $contact['firstName'] . $contact['listName'],
                            'phone'   => $contact['phone'],
                            'email'   => $contact['email'],
                            'message' => $contact['message'],
                        ];
                    }); */

                    return view('admin.contacts.index', [
                        'contactList' => $contactList
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $contact = \App\Contact::find($id);

        return view('admin.contacts.edit')->with('contact', $contact);
        // dd($contact->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = \App\Contact::find($id);
        
        $contact->firstName = $request->get('firstName', $contact->firstName);
        $contact->phone = $request->get('phone', $contact->phone);
        $contact->email = $request->get('email', $contact->email);
        $contact->save();

        return redirect('/admin/contacts');
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = \App\Contact::destroy($id);
        
        return redirect('/admin/contacts');
    }
}
