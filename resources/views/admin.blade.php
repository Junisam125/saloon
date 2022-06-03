@extends('Layout')



@section('content')
    <div class="container my-5">
        
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Appointment</th>
                </tr>
            </thead>
            @foreach ($reg as $reg)
            <tbody>
                <tr>
                    <td>{{$reg -> id}}</td>
                    <td>{{$reg -> FName}}</td>
                    <td>{{$reg -> LName}}</td>
                    <td>{{$reg -> phone}}</td>
                    <td>{{$reg -> Appointment}}</td>
                    <td><a href="/edit/{{$reg -> id}}">Update</a></td>
                    <td><a href="/delete/{{$reg -> id}}">Delete</a></td>
                </tr>
            </tbody>
            
            @endforeach
        </table>
            

        
        
        
        
        
            


    </div>
@endsection
