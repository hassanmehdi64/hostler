@extends('Dashboard.master-layout')
@section('content')

<div >
    <h4 style="text-align: center">About Section </h4>
   <div style="">
    <form action="" >
        <label for="">Title </label>
        <input type="text" name="about"  placeholder="enter title "/>

        <label for="">Detail </label>
        <textarea type="text" name="detail" >
            enter detail
        </textarea>

        <label for="">Link</label>
        <input type="text" name="link" placeholder="enter link " />

    </form>
   </div>

</div>



@endsection
