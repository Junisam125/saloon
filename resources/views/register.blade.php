@extends('Layout')



@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                
                
                <div class="container display-4 text-center my-4">Register</div>
            @csrf
            
            <form class="text-center" action="/store" method="POST">
                @csrf
                <div class="form-group">
                <label for="">First Name</label>
                <input type="text" class="form-control" name="FName">
            </div>
            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" class="form-control" name="LName">
            </div>   
            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="number" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label for="">Apponitment</label>
                <input type="text" class="form-control" name="Appointment">
            </div>
 
            <button type="submit" name="insert" class="btn btn-primary" value="submit">Submit</button>

        </form>
        
    </div>
        <div class="col-md-3"></div>
        
        </div>
    </div>
@endsection
