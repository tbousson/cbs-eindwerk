<script>


  @if(Session::has('success'))
     $.notify({
      icon: "add_alert",
      message: "{{Session::get('success')}}"},
       { //settings
     type:'success',
     placement: {
       from: "bottom",
       align: "center"
     },
     timer: 3000,
     animate: {
		enter: 'animated fadeInUp',
		exit: 'animated fadeOutDown'
	}
     }
     
     )
    //.show();
    //  @php
    //    Session::forget('success');
    //  @endphp
  @endif


  @if(Session::has('info'))
      $.notify({message: "{{ Session::get('info') }}"},
        {
        type:'info',
        placement: {
          from: "bottom",
          align: "center"
        },
        timer: 3000,
        animate: {
          enter: 'animated fadeInUp',
          exit: 'animated fadeOutDown'
        }
      })
      // .show();
      // @php
      //   Session::forget('info');
      // @endphp
  @endif


  @if(Session::has('warning'))
  		$.notify({message: "{{ Session::get('warning') }}" },
      {
        type:'warning',
        placement: {
          from: "bottom",
          align: "center"
        },
        timer: 3000,
        animate: {
          enter: 'animated fadeInUp',
          exit: 'animated fadeOutDown'
        },
        
       
      
      })
  @endif
 


  @if(Session::has('error'))
  		$.notify({message: "{{ Session::get('error') }}" },
      {
        type:'danger',
        placement: {
          from: "bottom",
          align: "center"
        },
        timer: 3000,
        animate: {
          enter: 'animated fadeInUp',
          exit: 'animated fadeOutDown'
        },
      })
      // .show();
      // @php
      //   Session::forget('error');
      // @endphp
  @endif


</script>

