@extends('layouts.admin')

@section('content')


       
    
    <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" 
                  class="dropzone" id="dropzone" style="position: absolute">
    @csrf
    <div>
    <input type="submit" value="submit" style="position: relative">
    </div>
</form>   

</body>
</html>

@endsection