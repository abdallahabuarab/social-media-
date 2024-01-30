@extends('frontend.main_master')
@section('header')
@include('frontend.body.header')
@endsection
@section('body')
<div class="gap gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row" id="page-contents">
@include('frontend.body.rightsidebar') <!--here -->



            <!-- Tab panes -->
            <div class="col-lg-6">
                <div class="central-meta">

                    <form action="{{ route('group.store') }}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                          <div class="form-group col-md-6">
                            <label for="groupDescription">Group Name</label>
                            <input name="name" style="background-color :whitesmoke" id="groupDescription" rows="3" placeholder="Enter group name">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="groupDescription">image:</label>
                            <input type="file" name="image" style="background-color:whitesmoke" id="groupDescription" rows="3" placeholder="Enter group description">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="groupDescription">Group Description:</label>
                            <textarea name="description" style="background-color:whitesmoke" id="groupDescription" rows="3" placeholder="Enter group description"></textarea>
                          </div>

                        </div>


                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>


                </div><!-- photos -->
            </div>
@include('frontend.body.liftsidebar')
</div>
</div>
</div>
</div>
</div>
@endsection


@section('footer')
@include('frontend.body.footer')
@endsection
