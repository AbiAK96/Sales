<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $representative->name }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $representative->email }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('telephone', 'Telephone:') !!}
    <p>{{ $representative->telephone }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('route', 'Route:') !!}
    <p>{{ $representative->route }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('join_date', 'Join Date:') !!}
    <p>{{ $representative->join_date }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('comments', 'Comments:') !!}
    <p>{{ $representative->comments }}</p>
</div>

