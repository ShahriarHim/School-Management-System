@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{asset('css/salauddin.css')}}">
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>


    <div class="form-div">
        <div class="page-content-header">
            <h2>Page Content Management</h2>
        </div>
        <form action="{{route('admin.page-content.update',$pageContent->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="col1">
            
            @if(session('status'))
                <div class="err-message alert alert-success">
                    <h1>{{session('status')}}</h1>
                </div>
            @endif
    
            </div>
            

            <div class="col1">
                <label for="title">Select Page name</label>
                <select name="slug" id="slug">
                    <option value="">Select One</option>
                    <option value="home">home</option>
                    <option value="notice">notice</option>
                    <option value="notice_details">notice detail</option>
                    <option value="event">event</option>
                    <option value="coaches">coaches</option>
                    <option value="gallery">gallery</option>
                    <option value="gallery_detail">gallery detail</option>
                    <option value="about">about</option>
                    <option value="contact">contact</option>
                </select>
            </div>

            <div class="col1">
                <label for="title">Status</label>
                <select name="status" id="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <div class="col1">
                <label for="title">Enter Title</label>
                <input type="text" name="title" id="" class="content-input">
            </div>



            <div class="col1">
                <label for="title">Enter Button Name</label>
                <input type="text" name="button" id="" class="content-input">
            </div>


            <div class="col1">
                <label for="title2">Enter second Title</label>
                <input type="text" name="title2" id="" class="content-input">
            </div>


            <div class="col1">
                <label for="image">Choose image</label>
                <input type="file" name="image" id="" class="content-input">
            </div>

            <div class="col1">
                <label for="editor">Page Content</label>
                <textarea id="editor2" name="content" class="page-content-text"></textarea>
            </div>



            <div class="content-submit">
                <button type="submit" class="about-content-button">Submit</button>
            </div>
        </form>
    </div>



    <!-- CKEditor dependencies -->
<!--     
    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.1/"
            }
        }
    </script>

    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Underline,
            Strikethrough,
            Paragraph,
            Font,
            Alignment,
            List,
            Indent,
            Link,
            BlockQuote,
            Table,
            TableToolbar,
            Image,
            ImageToolbar,
            ImageCaption,
            ImageStyle,
            ImageResize,
            MediaEmbed,
            RemoveFormat
        } from 'ckeditor5';

        ClassicEditor
            .create(document.querySelector('#editor2'), {
                plugins: [
                    Essentials, Bold, Italic, Underline, Strikethrough, Paragraph,
                    Font, Alignment, List, Indent, Link, BlockQuote, Table, TableToolbar,
                    Image, ImageToolbar, ImageCaption, ImageStyle, ImageResize,
                    MediaEmbed, RemoveFormat
                ],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', 'underline', 'strikethrough', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                    'alignment', '|', 'numberedList', 'bulletedList', '|',
                    'indent', 'outdent', '|', 'link', 'blockQuote', 'insertTable', '|',
                    'imageUpload', 'mediaEmbed', '|', 'removeFormat'
                ],
                

                fontFamily: {
                    options: [
                        'default',
                        'Poppins, Helvetica, Arial, sans-serif',
                        'Times New Roman, Times, serif',
                        'Georgia, serif',
                        'Courier New, Courier, monospace',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },

                fontSize: {
                    options: [
                        '8px', '10px', '12px', '14px', '16px', '18px', '20px', '24px',
                        '28px', '32px', '36px', '40px', '48px', '56px', '64px', '72px'
                    ],
                    supportAllValues: true
                },
                
                fontColor: {
                    default: '#000000', // Set default text color to black
                    columns: 5, // Optional: Customize the color picker grid
                    documentColors: 0 // Optional: Disable document color auto-detection
                },

                image: {
                    toolbar: [
                        'imageTextAlternative', 'imageStyle:inline', 'imageStyle:block', 'imageStyle:side',
                        '|', 'toggleImageCaption', 'resizeImage:25', 'resizeImage:50', 'resizeImage:75', 'resizeImage:original'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn', 'tableRow', 'mergeTableCells', 'tableProperties', 'tableCellProperties'
                    ]
                }
            })
            .catch(error => {
                console.error('Error initializing CKEditor:', error);
            });
    </script> -->


    <script>
        CKEDITOR.replace('editor2', {
            height: 500, // Set editor height
            toolbar: [
                { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'Undo', 'Redo'] },
                { name: 'editing', items: ['Find', 'Replace'] },
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', 'Blockquote'] },
                { name: 'insert', items: ['Image', 'Table', 'HorizontalRule'] },
                { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
                { name: 'colors', items: ['TextColor', 'BGColor'] },
                { name: 'tools', items: ['Maximize'] },
            ],
            extraPlugins: 'font,colorbutton,colordialog',
        });
    </script>

@endsection
