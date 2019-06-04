@extends('layouts.admin')

@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

<h1>Edit Comic: {{$comic->name}}</h1>

<form method="POST" action="{{Route('comics.update', ['comic' => $comic])}}">
    @method('PUT')
    <div class="row">
        <div class="col-md-8">
            <h3>Comic Info</h3>
            <label for="title">Title:</label>
            <div class="form-group">
                <input type="text" name="title" value="{{ old('title') ?? $comic->title}}" class="form-control"> 
                <div>{{ $errors->first('title')}}</div>
            </div>
            <label for="description">Description:</label>
            <div class="form-group">
                <textarea name="description"  cols="30" rows="10" class="form-control">{{ old('description') ?? $comic->description}}</textarea>
            </div>
            <div>{{ $errors->first('description')}}</div>
            
            <div class="row"><div class="col">
                    <label for="author">Author:</label>
                    <div class="form-group">
                            <select name="author_id" id="author_id" class="form-control">
                                @foreach ($authors as $author)
                                <option value="{{$author->id}}" {{ $author->id == $comic->author_id ? 'selected' : ''}}>{{$author->name}}</option>
                                @endforeach
                            </select>
                        </div>
            </div>
            <div class="col">
                    <label for="serie">Serie:</label>
                    <div class="form-group">
                        <select name="serie_id" id="serie_id" class="form-control">
                            @foreach ($series as $serie)
                            <option value="{{$serie->id}}" {{ $serie->id == $comic->serie_id ? 'selected' : ''}}>{{$serie->name}}</option>
                            @endforeach
                        </select>
                    </div>
            </div></div>





            <div class="row">
                <div class="col">
                        <label for="publishyear">Publish Year:</label>
                        <div class="form-group">
                            <input type="text" name="publishyear" value="{{ old('publishyear') ?? $comic->publishyear}}" class="form-control"> 
                            <div>{{ $errors->first('publishyear')}}</div>
                        </div>
                </div>
                <div class="col">
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
           
           
                
               <div>
                <label for="genres">Genres:</label>
                <div class="form-group">
                        <select class="js-select2-genres form-control" name="genres[]" multiple="multiple">
                            @foreach($genres as $genre)
                                <option value="{{$genre->id}}">{{$genre->name}}</option>


                            @endforeach
                          </select>
                    </div>
                </div>
                               
        </div>
        <div class="col">
            <div>
                
                    <label>Comic Cover:</label>
                    
                    <div class="form-group">
                            <img src="{{$comic->photo->thumbnail}}">
                            <div class="mt-2">
                            <input type="file" name="image">
                            </div>
                            <div>{{ $errors->first('images')}}</div>
                    </div>


                    <div class="row">
                            <div class="col-sm-3">
                        <label for="price">Price:</label>
                        <div class="form-group">
                                <input type="text" name="price" value="{{ old('price') ?? $comic->price}}" class="form-control"> 
                                <div>{{ $errors->first('price')}}</div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="stock">Stock:</label>
                            <div class="form-group">
                                <input type="text" name="stock" value="{{ old('stock') ?? $comic->stock}}" class="form-control"> 
                                <div>{{ $errors->first('stock')}}</div>
                            </div>
                        </div>
                        </div>
                        
                    
                    
            
            
                            
                        
                        
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
             @csrf
            <div class="form-group">
                <button class="btn btn-primary" type="submit">SUBMIT</button>
                <a href="{{ url()->previous() }}" class="btn btn-info">Cancel</a>
            <form action="{{route('comics.destroy', $comic->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    
                    <button type="submit" class="btn btn-danger delete-image">Delete Comic</button>
                    </div>
            </form>
        </div>
    </div>
</form>
        
    




    



@endsection

@section('js')
<script
src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.js-select2-genres').select2();
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
@endsection