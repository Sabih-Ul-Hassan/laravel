@extends('layouts.main')
@section('main-section')

<form action='{{ route("updateBook")."/".$book["id"] }}' method='post'>


@csrf
<div class=row>
    <label for="title" class='col-md-2 col-sm-12'>Title</label>
    <div class="col-md-4 col-sm-12">
        <input type="text" value={{$book['title']}}   class="form-control "  id=title name='title' placeholder="enter title here">
        <span>@error('title') <p> add title <p> @enderror</span>
    </div>
    <label for="author" class='col-md-2 col-sm-12'>Author</label>
    <div class="col-md-4 col-sm-12">
        <input type="text"  value={{$book['author']}}  class="form-control "  id=author name='author' placeholder="enter author here">
        <span>@error('author') <p> add author <p> @enderror</span>
    </div>
 </div>
<div class=row>
    <label for="no_of_pages" class='col-md-2 col-sm-12'>Pages</label>
    <div class="col-md-4 col-sm-12">
    <input type="number" value={{$book['no_of_pages']}}  class="form-control"  name='no_of_pages' placeholder="number of pages">
        <span>@error('no_of_pages') <p> add number of pages <p> @enderror </span>
        

    </div>
    <label for="author" class='col-md-2 col-sm-12'>Editor</label>
    <div class="col-md-4 col-sm-12">
        <input type="text" value={{$book['editor']}}  class="form-control"  name='editor' placeholder=editor >
        <span>@error('editor') <p> add editor <p> @enderror</span>
    </div>


 </div>

    <div class=row>
        <input class="btn btn-secandory col-sm-1 offset-sm-9"   type="submit">
    </div>

@endsection