@extends('layouts.app')

@section('content')
<div class="container">
    <h2>顯示contacts 列表</h2>

    

    <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Contact Content</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($contactList as $contact)
                           
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->message }}</td>
                <td>
                    <a class="btn btn-primary" href = "{{ route('editContact', $contact->id) }}">編輯</a>                   
                </td> 
                <td>
                    <form action="/admin/contacts/{{ $contact->id }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" name="{{ $contact->id }}" class="btn btn-danger">刪除
                        </button>
                    </form>
                </td>   
                <!--  <td><a class="btn btn-primary">刪除</a></td>  -->
            </tr>
            @endforeach
            <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>Moe</td>
                <td>mary@example.com</td>
            </tr>
            </tbody>
        </table>

    </div>
@endsection
