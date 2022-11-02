@extends('layouts.main')
@section('main-section')
<?php
if($message!=null) echo '<script>
alert("'.$message.'")
    </script>';
?>

<form action="/login" method='post'>

<fieldset>
<legend>Login</legend>
@csrf
<div class=row>
    <div class="  offset-md-3 col-md-6 offset-lg-4 col-lg-4">
        <input type="text"  name='username'   class="form-control" placeholder=username>
        @error('username') <p> add username <p> @enderror
    </div>
    <div class="  offset-md-3 col-md-6 offset-lg-4 col-lg-4">
        <input type="pasword" class="form-control" name='password' placeholder=password>
        @error('password') <p> add password <p> @enderror
    </div>
</div>
<input type="submit" class="btn btn-secondary">

</form>

@endsection
