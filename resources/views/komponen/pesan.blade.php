@if ($errors->any())
<div class='pt-3'>
    <div class="alert alert-info alert-dismissible fade show" role="alert" style="background-color: #ff0000; color: #ffffff; border-color: #bee5eb;">
        <strong>INFORMASI!</strong> anda harus mengisi semua data.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>

    
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{$item}}</li>
                
            @endforeach
        </ul>
    </div>
</div>

@endif
@if (Session::has('success'))
<div class='pt-3'>
  <div class="alert alert-success">
    {{Session::get('success')}}
  </div>
</div>
@endif

