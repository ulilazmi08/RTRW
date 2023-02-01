@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
            Update Password
        </div>
        <div class="card-body">
        <form action="">
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control mt-2" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>        

        </div>
      </div>

</div>

@endsection
    