@extends('admin.layouts.master')
@section('page_title')
    Seo settings and configuration
@endsection

@section('page_headline')
    Seo settings
@endsection

@section('main_content')
    <div class="container">
        @include('admin.layouts.includes.messages')

        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Your website SEO settings</h3>
                    </div>
                    <form action="{{ route('settings.seo.store', $meta_info->id) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Meta Title</label>
                                <input name="meta_title" value="{{ $meta_info->meta_title ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Meta author</label>
                                <input name="meta_author" value="{{ $meta_info->meta_author ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Meta Tags</label>
                                <input name="meta_tags" value="{{ $meta_info->meta_tags ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Meta Description</label>
                                <input name="meta_description" value="{{ $meta_info->meta_description ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Meta Keyword</label>
                                <input name="meta_keyword" value="{{ $meta_info->meta_keyword ?? '' }}" class="form-control">
                            </div>
                            <p class="text-primary text-center">-----------------------others--------------------</p>
                            <div class="form-group">
                                <label>Google Varification</label>
                                <input name="google_varification" value="{{ $meta_info->google_varification ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Google Analytics</label>
                                <input name="google_analytics" value="{{ $meta_info->google_analytics ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Google Adsense</label>
                                <input name="google_adsense" value="{{ $meta_info->google_adsense ?? '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Alexa Varification</label>
                                <input name="alexa_varification" value="{{ $meta_info->alexa_varification ?? '' }}" class="form-control">
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
