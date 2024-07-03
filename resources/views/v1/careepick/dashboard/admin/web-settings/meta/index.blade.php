@extends('v1.careepick.dashboard.layouts.ad-master')

@section('content')
    <div class="upper-title-box">
        <h3>Manage Meta Information</h3>
        <div class="text">Select a page to edit its meta information</div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>Select Page</h4>
                    </div>
                    <div class="widget-content">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="metaForm" method="POST" action="">
                            @csrf
                            @method('PUT')
                            <div class="mb-4 col-md-12 col-sm-12">
                                <label>Select Page</label>
                                <select id="pageSelect" name="page_name" class="form-control">
                                    <option value="">-- Select Page --</option>
                                    @foreach($pages as $pageKey => $pageName)
                                        <option value="{{ $pageKey }}">{{ $pageName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="metaFields">
                                <div class="mb-4 col-md-12 col-sm-12">
                                    <label>Title</label>
                                    <input type="text" id="title" name="title" value="" class="form-control">
                                </div>
                                <div class="mb-4 col-md-12 col-sm-12">
                                    <label>Meta Author Name</label>
                                    <input type="text" id="meta_author_name" name="meta_author_name" value="" class="form-control">
                                </div>
                                <div class="mb-4 col-md-12 col-sm-12">
                                    <label>Meta Description</label>
                                    <textarea id="meta_description" name="meta_description" class="form-control"></textarea>
                                </div>
                                <div class="mb-4 col-md-12 col-sm-12">
                                    <label>Meta Keywords</label>
                                    <textarea id="meta_keywords" name="meta_keywords" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary full-width font--bold btn-md">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('pageSelect').addEventListener('change', function() {
            var pageName = this.value;
            if (pageName) {
                fetch('/admin/web-settings/meta/load-meta-info', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ page_name: pageName })
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('metaForm').action = '/admin/web-settings/meta/' + pageName;
                    document.getElementById('title').value = data.title || '';
                    document.getElementById('meta_author_name').value = data.meta_author_name || '';
                    document.getElementById('meta_description').value = data.meta_description || '';
                    document.getElementById('meta_keywords').value = data.meta_keywords || '';
                    document.getElementById('metaFields').style.display = 'block';
                })
                .catch(error => console.error('Error:', error));
            } else {
                document.getElementById('metaFields').style.display = 'none';
            }
        });
    </script>
@endsection
