@extends('Layout')



@section('content')
    <div class="container my-5">
        <div class="container display-4">Register</div>
@csrf

        <form action="/update/{{$reg -> id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" class="form-control" placeholder="FName" name="FName" value={{$reg -> FName}}>
            </div>
            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" class="form-control" placeholder="LName" name="LName" value={{$reg -> LName}}>
            </div>   
            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="number" class="form-control" placeholder="phone" name="phone" value={{$reg -> phone}}>
            </div>
            <div class="form-group">
                <label for="">Apponitment</label>
                <input type="text" class="form-control" placeholder="Appointment" name="Appointment" value={{$reg -> Appointment}}>
            </div>
 
            <button type="submit" name="update" class="btn btn-primary" value="update">Update</button>

        </form>


    </div>
@endsection
