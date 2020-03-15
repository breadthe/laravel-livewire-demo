<h1 class="card-header">Dashboard</h1>

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<p>Hello {{ auth()->user()->name }}</p>
