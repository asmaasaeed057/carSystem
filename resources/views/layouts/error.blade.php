@if(count($errors->all()) > 0)
<div class="callout callout-danger">
    <h4> Error !</h4>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if(session()->has('error'))
<div class="callout callout-danger">
        <h4>Warning!</h4>
        <p>{{ session('error') }}</p>
</div>
@endif

@if(session()->has('success'))
<div class="callout callout-success">
        <h4>success!</h4>
        @if(session()->has('success'))
	    <p> {{ session('success') }} </p>
	    @endif
</div>
@endif


