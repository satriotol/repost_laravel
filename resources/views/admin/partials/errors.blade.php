@if ($errors->any())
<div class="alert alert-danger alert-has-icon">
    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
    <div class="alert-body">
        <div class="alert-title">Danger</div>
        <ul class="list-group">
            @foreach ($errors->all() as $error)
            {{$error}}
            @endforeach
        </ul>
    </div>
</div>
@endif