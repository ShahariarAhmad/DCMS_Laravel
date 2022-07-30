@extends('layouts.backend.layout')
@section('content')
    <div class="content">
      @if (session()->has('status'))
            <div class="alert alert-success" role="alert" class="col">
                {{ session()->get('status') }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="row text-dark d-flex justify-content-center">

                <form action="{{ route('Dashboard_updateBlogPost') }}" method="post" class="row"
                    enctype="multipart/form-data">
                    <div class="col-xl-8 col-lg-8 bg-light p-5 shadow rounded">
                        @csrf
                        @foreach ($blog as $item)
                            <img src="{{ asset($item->img_url) }}" class="img-responsive w-100 pb-5">
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            {{-- <input type="hidden" name="img_link" value="{{ $item->img_url }}"> --}}
                            <input type="text" name="title" class="w-100 form-control mb-5 form-control @error('title') is-invalid @enderror"
                                value="{{ $item->title }}">
                            <br>
                            <textarea id="default" name="article" class="form-control @error('article') is-invalid @enderror" style="height:600px">{{ $item->article }}</textarea>
                            <div class="form-group my-4">
                                <div class="input-group">
                                    <div>
                                   
                                        <input type="file" name="file" class="@error('file') is-invalid @enderror">
                                        
                                        @error('file')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="update" value="Update" class="btn btn-success px-5 py-2 float-right">
                            {{-- <input type="submit" name="draft" value="Save as Draft" class="btn btn-dark px-5 py-2 float-right"> --}}
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="row px-4">
                            {{-- <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tags</h5>
                                    <hr>

                                    @foreach ($tags as $item)
                                        <input type="checkbox" name="tag[]" value="{{ $item->id }}"> {{ $item->tag }}
                                        <br>
                                    @endforeach

                                </div>
                            </div> --}}

                            <div class="card">

                                <p class="card-header">Category</p>
                           
                                <div class="card-body @error('category') border border-danger @enderror">
                                

                                    @foreach ($categories as $item)
                                        <input type="checkbox" name="category[]" value="{{ $item->id }}">
                                        {{ $item->category }} <br>
                                    @endforeach

                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                  
                    @endforeach


                </form>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

@section('js')
    <script>
        var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

        tinymce.init({
            selector: 'textarea',
            plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export',
            mobile: {
                plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker textpattern noneditable help formatpainter pageembed charmap mentions quickbars linkchecker emoticons advtable'
            },
            menu: {
                tc: {
                    title: 'Comments',
                    items: 'addcomment showcomments deleteallconversations'
                }
            },
            menubar: 'file edit view insert format tools table tc help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            link_list: [{
                    title: 'My page 1',
                    value: 'https://www.tiny.cloud'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.moxiecode.com'
                }
            ],
            image_list: [{
                    title: 'My page 1',
                    value: 'https://www.tiny.cloud'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.moxiecode.com'
                }
            ],
            image_class_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'Some class',
                    value: 'class-name'
                }
            ],
            importcss_append: true,
            templates: [{
                    title: 'New Table',
                    description: 'creates a new table',
                    content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
                },
                {
                    title: 'Starting my story',
                    description: 'A cure for writers block',
                    content: 'Once upon a time...'
                },
                {
                    title: 'New list with dates',
                    description: 'New List with dates',
                    content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
                }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 600,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            spellchecker_ignore_list: ['Ephox', 'Moxiecode'],
            tinycomments_mode: 'embedded',
            content_style: '.mymention{ color: gray; }',
            contextmenu: 'link image imagetools table configurepermanentpen',
            a11y_advanced_options: true,
            skin: useDarkMode ? 'oxide-dark' : 'oxide',
            content_css: useDarkMode ? 'dark' : 'default',
        });
    </script>
@endsection
