@extends('admin.layouts.master')
@section('page_title')
    Website settings and configuration
@endsection

@section('page_headline')
    Website settings
@endsection

@section('main_content')
    <div class="container">
        @include('admin.layouts.includes.messages')

        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Your website information</h3>
                    </div>
                    <form action="{{ route('settings.website.store', $website_info->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Currency</label>
                                <select name="currency" class="form-control">
                                    <option value="$" {{ ($website_info->currency === '$') ? 'selected' : '' }}>USD($)</option>
                                    <option value="৳" {{ ($website_info->currency === '৳') ? 'selected' : '' }}>Taka(৳)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Phone One</label>
                                <input type="text" name="phone_one" value="{{ $website_info->phone_one ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone Two</label>
                                <input type="text" name="phone_two" value="{{ $website_info->phone_two ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Main Mail</label>
                                <input type="email" name="main_mail" value="{{ $website_info->main_mail ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Support Mial</label>
                                <input type="email" name="support_mail" value="{{ $website_info->support_mail ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Website Logo</label>
                                <input type="file" name="logo" value="{{ $website_info->logo ?? '' }}" class="form-control dropify">
                                <p>Previous Logo: <img src="{{ asset('storage/files/website_settings_images/'.$website_info->logo) }}" alt="" height="40" width="50"></p>
                            </div>
                            <div class="form-group">
                                <label>Website Favicon</label>
                                <input type="file" name="favicon" value="{{ $website_info->favicon ?? '' }}" class="form-control dropify">
                                <p>Previous Faviocn: <img src="{{ asset('storage/files/website_settings_images/'.$website_info->favicon) }}" alt="" height="40" width="50"></p>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" value="{{ $website_info->address ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Facebook Link</label>
                                <input type="text" name="facebook_link" value="{{ $website_info->facebook_link ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Instragram Link</label>
                                <input type="text" name="instragram_link" value="{{ $website_info->instragram_link ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Twitter Link</label>
                                <input type="text" name="twitter_link" value="{{ $website_info->twitter_link ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Youtube Link</label>
                                <input type="text" name="youtube_link" value="{{ $website_info->youtube_link ?? '' }}" class="form-control">
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
