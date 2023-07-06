@extends('admin.layouts.master')
@section('page_title')
    SMTP settings and configuration
@endsection

@section('page_headline')
    SMTP settings
@endsection

@section('main_content')
    <div class="container">
        @include('admin.layouts.includes.messages')

        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Set your mail information</h3>
                    </div>
                    <form action="{{ route('settings.smtp.store', $smtp_info->id) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Mail Mailer</label>
                                <input name="mailer" value="{{ $smtp_info->mailer ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mail Host</label>
                                <input name="host" value="{{ $smtp_info->host ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mail Port</label>
                                <input name="port" value="{{ $smtp_info->port ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mail Username</label>
                                <input name="username" value="{{ $smtp_info->username ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mail Password</label>
                                <input name="password" value="{{ $smtp_info->password ?? '' }}" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
