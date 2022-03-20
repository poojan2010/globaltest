@extends('layouts.app')

@section('content')
<head>
</head>
<div class="container">
    <a href="{{route('addcategoryform')}}" type="submit" class="btn btn-primary">Add Category</a>

    <div class="row justify-content-center">
    
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Category Name</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)      
            <tr>
                <th scope="row"></th>
                <td>{{$item->name}}</td>
                <td>
                    <a href="{{ route('edit.category',['id' => $item->id]) }}" class="btn btn-success">Edit</a>
                    <a href="{{ route('delete.category',['id' => $item->id]) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        
    </tbody>
    </table>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Category Name</th>
        <th scope="col">Sub Category Name</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach($subcat as $item)     
            @foreach($item['subcategory'] as $value)    
                <tr>
                    <th scope="row"></th>
                    <td>{{$item->name}}</td>
                    <td>{{$value->name}}</td>
                    <td>
                        <a href="{{ route('edit.subcategory',['id' => $value->id]) }}" class="btn btn-success">Edit</a>
                        <a href="{{ route('delete.subcategory', ['id' => $value->id]) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        @endforeach
        
    </tbody>
    </table>


    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Category Name</th>
        <th scope="col">Sub Category Name</th>
        <th scope="col">Sub Sub Category Name</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach($subsubcat as $item)     
            @foreach($item['subcategory'] as $value) 
                @foreach($value['subSubCategory'] as $val)   
                    <tr>
                        <th scope="row"></th>
                        <td>{{$item->name}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$val->name}}</td>
                        <td>
                            
                            <a href="{{ route('edit.subsubcategory',['id' => $val->id]) }}" class="btn btn-success">Edit</a>
                            <a href="{{ route('delete.subsubcategory',['id' => $val->id]) }}" class="btn btn-danger">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        @endforeach
        
    </tbody>
    </table>
    </div>
</div>
@endsection
