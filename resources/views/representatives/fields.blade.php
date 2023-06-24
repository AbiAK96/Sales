<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Telephone:') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('route', 'Route:') !!}
    {!! Form::select('route', $route ,$route_id, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('join_date', 'Join Date:') !!}
    {!! Form::date('join_date', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('comments', 'Comments:') !!}
    {!! Form::text('comments', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>