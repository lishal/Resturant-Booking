
    @if(count($errors)>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger"  id="error">
            {{$error}}
        </div>
    @endforeach
@endif
  

@if(session('success'))
    <div class="alert alert-success" id="success">
        {{session('success')}}
    </div>
@endif


<script>

setTimeout(function() {
    $('#success').fadeOut("slow","swing")
}, 5000);

</script>
<script>

    setTimeout(function() {
        $('#error').fadeOut("slow","swing")
    }, 5000);
    
    </script>