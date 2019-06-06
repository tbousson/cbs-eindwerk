@extends('layouts.v2.admin')
@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
@endsection
@section('breadcrumb')
{{ Breadcrumbs::render('createcomic') }}

@endsection
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
            <h4 class="card-title ">Create New Comic</h4>
            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
            </div>
            <div class="card-body">
            <form method="POST" action="{{Route('comics.store')}}" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="bmd-label-floating" for="title">Title</label>
                    <input type="text" name="title" value="{{ old('title') ?? $comic->title}}" class="form-control"> 
                    <div>{{ $errors->first('title')}}</div>
                </div>
                
                <div class="form-group">
                        <label class="bmd-label-floating" for="description">Description</label>
                    <textarea name="description"  cols="30" rows="10" class="form-control">{{ old('description') ?? $comic->description}}</textarea>
                </div>
                <div>{{ $errors->first('description')}}</div>
                
                <div class="row"><div class="col">
                        
                        <div class="form-group">
                                <label class="bmd-label-floating" for="author">Author</label>
                                <select name="author_id" id="author_id" class="form-control">
                                    <option value="" disabled selected>Select a Author</option>
                                    @foreach ($authors as $author)
                                    <option value="{{$author->id}}" {{ old('author_id') == $author->id ? 'selected' : ''}}>{{$author->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                </div>
                <div class="col">
                        
                        <div class="form-group">
                            <label class="bmd-label-floating"  for="serie">Serie</label>
                            <select name="serie_id" id="serie_id" class="form-control">
                                    <option value="" disabled selected>Select a Serie</option>
                                @foreach ($series as $serie)
                                <option value="{{$serie->id}}" {{ old('serie_id') == $serie->id ? 'selected' : ''}}>{{$serie->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                            
                            <div class="form-group">
                                <label  class="bmd-label-floating"  for="publishyear">Publish Year</label>
                                <input type="text" name="publishyear" value="{{ old('publishyear') ?? $comic->publishyear}}" class="form-control"> 
                                <div>{{ $errors->first('publishyear')}}</div>
                            </div>
                    </div>
                    <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="publisher" class="bmd-label-floating" >Publisher</label>
                                <select name="publisher_id" id="publisher_id" class="form-control">
                                        <option value="" disabled selected>Select a Publisher</option>
                                    @foreach ($publishers as $publisher)
                                    <option value="{{$publisher->id}}" {{ old('publisher_id') == $publisher->id  ? 'selected' : ''}}>{{$publisher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                        
                  <div class="row">  
                   <div class="col-md-12">
                    <label for="genres">Genres:</label>
                    <div class="form-group">
                            <select class="js-select2-genres form-control" name="genres[]" multiple="multiple" id="selectgenres">
                                @foreach($genres as $genre)
                                    <option value="{{$genre->id}}">{{$genre->name}}</option>
    
    
                                @endforeach
                              </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
                                   
         <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div>
                        <label>Comic Cover</label>
                        <div class="form-group">
                                <div class="input-file-container">  
                                        <input class="input-file" id="my-file" type="file" name="photo">
                                        <label tabindex="0" for="my-file" class="input-file-trigger btn btn-primary">Select a file...</label>
                                      </div>
                                      <p class="file-return"></p>
                                </div>
                                <div>{{ $errors->first('photo_id')}}</div>
                        </div>
    
    
                        <div class="row">
                                <div class="col-md-6">
                            <label for="price">Price</label>
                            <div class="form-group">
                                    <input type="text" name="price" value="{{ old('price') ?? $comic->price}}" class="form-control"> 
                                    <div>{{ $errors->first('price')}}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="stock">Stock</label>
                                <div class="form-group">
                                    <input type="text" name="stock" value="{{ old('stock') ?? $comic->stock}}" class="form-control"> 
                                    <div>{{ $errors->first('stock')}}</div>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                    <div class="col-m9">
                                         @csrf
                                            
                                            <button class="btn btn-primary float-left" type="submit">SUBMIT</button>
                                            <a href="{{ url()->previous() }}" class="btn btn-info float-left">Cancel</a>
                                            
                                        </form>
                                    
                                    
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            
         
                </div>
            </div>
        </div>
    </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                {{-- <div>
                
                <div class="form-group">
                    <label class="bmd-label-floating" for="title">Title</label>
                    <input type="text" name="title" value="{{ old('title') ?? $comic->title}}" class="form-control"> 
                    <div>{{ $errors->first('title')}}</div>
                </div>
                
                <div class="form-group">
                    <label class="bmd-label-floating" for="description">Description</label>
                    <textarea name="description" value="{{ old('description') ?? $comic->description}}" cols="30" rows="10" class="form-control">{{ old('description') ?? $comic->description}}</textarea>
                </div>
                
                <div class="form-group">
                    <label class="bmd-label-floating" for="publishyear">Publish Year</label>
                    <input type="text" name="publishyear" value="{{ old('publishyear') ?? $comic->publishyear}}" class="form-control"> 
                    <div>{{ $errors->first('publishyear')}}</div>
                </div>
                
                <div class="form-group">
                    <label class="bmd-label-floating" for="price">Price</label>
                    <input type="text" name="price" value="{{ old('price') ?? $comic->price}}" class="form-control"> 
                    <div>{{ $errors->first('price')}}</div>
                </div>
               
                <div class="form-group">
                    <label class="bmd-label-floating" for="stock">Stock</label>
                    <input type="text" name="stock" value="{{ old('stock') ?? $comic->stock}}" class="form-control"> 
                    <div>{{ $errors->first('stock')}}</div>
                </div>
                
                <div class="form-group">
                    <label for="author_id">Author</label>
                    <select class="custom-select my-1 mr-sm-2" name="author_id">
                        <option value="0" selected disabled>Choose Author</option>
                        @foreach($authors as $author)
                        
                        <option value="{{$author->id}}" {{(old('author_id') == $author->id) ? 'selected':""}}>{{$author->name}}</option>
                        @endforeach
                    </select>
                    <div>{{ $errors->first('author_id')}}</div>
                </div>
                
                <div class="form-group">
                    <label for="serie_id">Serie</label>
                    <select class="custom-select my-1 mr-sm-2" name="serie_id">
                        <option value="0" selected disabled>Choose Serie</option>
                        @foreach($series as $serie)
                        
                        <option value="{{$serie->id}}" {{(old('serie_id') == $serie->id) ? 'selected':""}}>{{$serie->name}}</option>
                        @endforeach
                    </select>
                    <div>{{ $errors->first('serie_id')}}</div>
                </div>
               
                <div class="form-group">
                    <label for="publisher_id">Publisher</label>
                    <select class="custom-select my-1 mr-sm-2" name="publisher_id">
                        <option value="0" selected disabled>Choose Publisher</option>
                        @foreach($publishers as $publisher)
                        
                        <option value="{{$publisher->id}}" {{(old('publisher_id') == $publisher->id) ? 'selected':""}}>{{$publisher->name}}</option>
                        @endforeach
                    </select>
                    <div>{{ $errors->first('publisher_id')}}</div>
                </div>
                
                    <label>Comic Cover</label>
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
    </form> --}}

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
        var myDropzone = new Dropzone(".dropzone",{
            url: "{{route('comics.store')}}",
            uploadMultiple: false,
            parallelUploads: 1,
            maxFiles: 1,
            succes: false,
            
            autoProcessQueue: false,
            addRemoveLinks: true,
            paramName: "photo", // The name that will be used to transfer the file
            acceptedFiles: ".jpeg,.jpg,.png,.gif, .svg", 
            maxFilesize: 10, // MB
            
            
            sending: function(file, xhr, formData) {
                
                formData.append("_token", "{{ csrf_token() }}");
            }
        });
         
 


        $("#dropzone").addClass("dropzone")

        $("button[type=submit]").click(function(formData) {
            
            myDropzone.processQueue();
            
        });
        </script>
<script>
        document.querySelector("html").classList.add('js');
    
    var fileInput  = document.querySelector( ".input-file" ),  
        button     = document.querySelector( ".input-file-trigger" ),
        the_return = document.querySelector(".file-return");
          
    button.addEventListener( "keydown", function( event ) {  
        if ( event.keyCode == 13 || event.keyCode == 32 ) {  
            fileInput.focus();  
        }  
    });
    button.addEventListener( "click", function( event ) {
       fileInput.focus();
       return false;
    });  
    fileInput.addEventListener( "change", function( event ) {  
        the_return.innerHTML = this.value;  
    });  
    </script>


@endsection