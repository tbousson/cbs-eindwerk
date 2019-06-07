@extends('layouts.v2.admin')

@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('breadcrumb')
{{ Breadcrumbs::render('editcomic', $comic->id) }}

@endsection
@section('content')

<div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title ">Edit Comic: {{$comic->title}}</h4>
                {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{Route('comics.update', ['comic' => $comic])}}" enctype="multipart/form-data">
                     @method('PUT')
                <div class="form-group">
                <label class="bmd-label-floating" for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') ?? $comic->title}}" class="form-control"> 
                <div>{{ $errors->first('title')}}</div>
            </div>
            <label class="bmd-label-floating" for="description">Description:</label>
            <div class="form-group">
                <textarea name="description"  cols="30" rows="10" class="form-control">{{ old('description') ?? $comic->description}}</textarea>
            </div>
            <div>{{ $errors->first('description')}}</div>
            
            <div class="row"><div class="col">
                    <label class="bmd-label-floating" for="author">Author:</label>
                    <div class="form-group">
                            <select name="author_id" id="author_id" class="form-control">
                                @foreach ($authors as $author)
                                <option value="{{$author->id}}" {{ $author->id == $comic->author_id ? 'selected' : ''}}>{{$author->name}}</option>
                                @endforeach
                            </select>
                        </div>
            </div>
            <div class="col">
                    
                    <div class="form-group">
                        <label class="bmd-label-floating"  for="serie">Serie:</label>
                        <select name="serie_id" id="serie_id" class="form-control">
                            @foreach ($series as $serie)
                            <option value="{{$serie->id}}" {{ $serie->id == $comic->serie_id ? 'selected' : ''}}>{{$serie->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                        
                        <div class="form-group">
                            <label  class="bmd-label-floating"  for="publishyear">Publish Year:</label>
                            <input type="text" name="publishyear" value="{{ old('publishyear') ?? $comic->publishyear}}" class="form-control"> 
                            <div>{{ $errors->first('publishyear')}}</div>
                        </div>
                </div>
                <div class="col-md-6">
                        <label for="publisher">Publisher:</label>
                        <div class="form-group">
                            <select name="publisher_id" id="publisher_id" class="form-control">
                                @foreach ($publishers as $publisher)
                                <option value="{{$publisher->id}}" {{ $publisher->id == $comic->publisher_id ? 'selected' : ''}}>{{$publisher->name}}</option>
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
                            @if($comic->photo_id)<img src=" {{url($comic->photo->thumbnail) }}">
                            @else No Cover
                            @endif
                            <div class="mt-2">
                                    <div class="input-file-container">  
                                            <input class="input-file" id="my-file" type="file" name="photo">
                                            <label tabindex="0" for="my-file" class="input-file-trigger btn btn-primary">Select a file...</label>
                                          </div>
                                          <p class="file-return"></p>
                            {{-- <input type="file" name="photo"> --}}
                            
                            </div>
                            <div>{{ $errors->first('photo')}}</div>
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
                                <div  class="col">
                                    <form action="{{route('comics.destroy', $comic->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            
                                            <button type="submit" class="btn btn-danger delete-image float-right">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
     
            </div>
        </div>
    </div>
</div>

    
        
    




    



@endsection

@section('js')
<script
src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.js-select2-genres').select2(
        
    );
    $('.js-select2-genres').val({!!$comic->genres()->pluck('id') !!}).trigger('change');
});
</script>

<script>
   $(function () {
    

    $( "#tablecontents" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      update: function() {
          sendOrderToServer();
      }
    });

    function sendOrderToServer() {

      var order = [];
      var id = {{$comic->id}}
    
      $('tr.row1').each(function(index,element) {
        order.push({
          id: $(this).attr('data-id'),
          position: index
        });
      });

      $.ajax({
        type: "POST", 
        dataType: "json", 
        url: "updateorder",
        data: {
          comicid: id,
          order:order,
          _token: '{{csrf_token()}}'
        },
        success: function(response) {
            if (response.status == "success") {
              console.log(response);
            } else {
              console.log(response);
            }
        }
      });

    }
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