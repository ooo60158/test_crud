@extends('layouts.app')

@section('content')
<div class="container">
    <h2>編輯 Contacts (ID: {{ $contact->id }})</h2>
    
    <form action="/admin/contacts/{{ $contact->id }}" method="post">
        {{ method_field('Put') }}
        {{ csrf_field() }}
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Contact Content</th>               
            </tr>
            </thead>
            <tbody>                           
            <tr>
                <td><input type = "text" name = "firstName" id="" value="{{ $contact->firstName }}"/></td>
                <td><input type = "text" name = "phone" id="" value="{{ $contact->phone }}"/></td>
                <td><input type = "text" name = "email" id="" value="{{ $contact->email }}"/></td>
                <td>{{ $contact->message }}</td>
                
            </tr>      
            </tbody>           
        </table>
        <button type="submit">送出修改</button>
    </form>

</div>
@endsection
