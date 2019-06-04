@extends('layouts.admin')
@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')

            <h1>Create Comic</h1>

            <form method="POST" action="{{Route('comics.store')}}" enctype="multipart/form-data">
                <div>
                <label for="title">Title:</label>
                <div class="form-group">
                    <input type="text" name="title" value="{{ old('title') ?? $comic->title}}" class="form-control"> 
                    <div>{{ $errors->first('title')}}</div>
                </div>
                <label for="description">Description:</label>
                <div class="form-group">
                    <textarea name="description" value="{{ old('description') ?? $comic->description}}" cols="30" rows="10" class="form-control">{{ old('description') ?? $comic->description}}</textarea>
                </div>
                <label for="publishyear">Publish Year:</label>
                <div class="form-group">
                    <input type="text" name="publishyear" value="{{ old('publishyear') ?? $comic->publishyear}}" class="form-control"> 
                    <div>{{ $errors->first('publishyear')}}</div>
                </div>
                <label for="price">Price:</label>
                <div class="form-group">
                    <input type="text" name="price" value="{{ old('price') ?? $comic->price}}" class="form-control"> 
                    <div>{{ $errors->first('price')}}</div>
                </div>
                <label for="stock">Stock:</label>
                <div class="form-group">
                    <input type="text" name="stock" value="{{ old('stock') ?? $comic->stock}}" class="form-control"> 
                    <div>{{ $errors->first('stock')}}</div>
                </div>
                <label for="author_id">Author:</label>
                <div class="form-group">
                    <select class="custom-select my-1 mr-sm-2" name="author_id">
                        <option value="0" selected disabled>Choose Author</option>
                        @foreach($authors as $author)
                        
                        <option value="{{$author->id}}" {{(old('author_id') == $author->id) ? 'selected':""}}>{{$author->name}}</option>
                        @endforeach
                    </select>
                    <div>{{ $errors->first('author_id')}}</div>
                </div>
                <label for="serie_id">Serie:</label>
                <div class="form-group">
                    <select class="custom-select my-1 mr-sm-2" name="serie_id">
                        <option value="0" selected disabled>Choose Serie</option>
                        @foreach($series as $serie)
                        
                        <option value="{{$serie->id}}" {{(old('serie_id') == $serie->id) ? 'selected':""}}>{{$serie->name}}</option>
                        @endforeach
                    </select>
                    <div>{{ $errors->first('serie_id')}}</div>
                </div>
                <label for="publisher_id">Publisher:</label>
                <div class="form-group">
                    <select class="custom-select my-1 mr-sm-2" name="publisher_id">
                        <option value="0" selected disabled>Choose Publisher</option>
                        @foreach($publishers as $publisher)
                        
                        <option value="{{$publisher->id}}" {{(old('publisher_id') == $publisher->id) ? 'selected':""}}>{{$publisher->name}}</option>
                        @endforeach
                    </select>
                    <div>{{ $errors->first('publisher_id')}}</div>
                </div>
                
                    <label>Comic Cover:</label>
                    <div class="form-group">
                        
                            <div>
                            <input type="file" name="photo_id">
                            </div>
                            <div>{{ $errors->first('photo_id')}}</div>
                    </div>
                  
                     
                @csrf
          
                    <div class="form-group">
                        <select class="js-select2-genres form-control" name="genres[]" multiple="multiple">
                            @foreach($genres as $genre)
                                <option value="{{$genre->id}}">{{$genre->name}}</option>


                            @endforeach
                          </select>
                    </div>
                <div>{{ $errors}}</div>
                          
                    </div>
        <div>
        <button class="btn btn-primary" type="submit">SUBMIT</button>
        </div>
    </form>

@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.js-select2-genres').select2();
});
</script>
<script>
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#dropzone",{
            url: "{{Route('comics.store')}}",
            uploadMultiple: true,
            parallelUploads: 25,
            maxFiles: 25,
            autoProcessQueue: false,
            addRemoveLinks: true,
            paramName: "images", // The name that will be used to transfer the file
            acceptedFiles: ".jpeg,.jpg,.png,.gif, .svg", 
            maxFilesize: 10, // MB
            sending: function(file, xhr, formData) {
                
                formData.append("_token", "{{ csrf_token() }}");
            }
        });
        
        $("button[type=submit]").click(function(formData) {
            
            myDropzone.processQueue();
        });
        </script>



@endsection