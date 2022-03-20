

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-4">
                @if($is_form == '1')
                <form action="{{route('add.category')}}" method=POST style="margin-top: 50%;">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @endif

                @if($is_form == '2')
                <form action="{{route('add.subcategory')}}" method=POST style="margin-top: 50%;">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Select Category</label>
                        <select name="category" class="form-control">
                            @foreach($data as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Sub Category Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @endif

                @if($is_form == '3')
                <form action="{{route('add.subsubcategory')}}" method=POST style="margin-top: 50%;">
                    @csrf
                    <div class="mb-3">
                        <label for="category" class="form-label">Select Category</label>
                        <select name="category" class="form-control" id="category">
                            @foreach($data as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3" id="subcategory">
                        <label for="subcategory" class="form-label">Select Sub Category</label>
                            <select name="subcategory" class="form-control" id="submenu">
                            </select>
                    </div>

                    <div class="mb-3">
                        <label for="subsubcategory" class="form-label">Sub Sub Category Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @endif
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            var cat = $('#category').val();
            getSubData(cat)
            $(document).on('change', '#category', function() {
                var cat = $(this).val();
                // alert(cat);

                getSubData(cat)
            })
        });

        function getSubData(cat) {
            $.ajax({
                type: 'GET',
                url: '/get-subcategory?cat=' + cat,
                success(data) {
                    var formoption = " ";
                    $.each(data, function(v) {
                        var val = data[v]['name'];
                        var id = data[v]['id'];
                        formoption += "<option value='" + id + "'>" + val + "</option>";
                    });
                    $('#submenu').html(formoption);


                }
            })
        }
    </script>

@endsection