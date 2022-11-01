@extends('layouts.main')
@section('main-section')

<?php

if(!$books) echo '<center><h1 style="margin-top:180px" > No book To Show </h1></center>';
else{ 
    echo '
            <table class="table" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Editor</th>
            <th scope="col">Pages</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        ';
        $no=1;
        foreach($books as $book)
             echo '<tr>
            <th scope="row">'.$no++.'</th>
            <td>'.$book['title'].'</td>
            <td>'.$book['author'].'</td>
            <td>'.$book['editor'].'</td>
            <td>'.$book['no_of_pages'].'</td>
            <td><a href="books/delete/'.$book['id'].'"><button class="btn btn-info">Delete</button></a></td>
            <td><a href="books/update/'.$book['id'].'"><button class="btn btn-secondary">Update</button></a></td>
            </tr>';
        echo '
        </tbody>
        </table>';
}
if($message!=null) echo '<script>
    alert("'.$message.'")
        </script>';
?>
@endsection