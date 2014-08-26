@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.profile') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="col-md-12">
    <div class="box box-success box-solid">
        <div class="box-header">
            <h3 class="box-title">User Profile</h3>
        </div>
        <div class="box-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Signed Up</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{{$user->id}}}</td>
                        <td>{{{$user->username}}}</td>
                        <td>{{{$user->joined()}}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
