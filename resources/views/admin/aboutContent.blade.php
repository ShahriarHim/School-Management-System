<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CKEditor 5 - Extend Features</title>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css" />
</head>
<body>

    <form action="/submit" method="POST">
         @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <label for="editor">Your Content:</label>
        <textarea id="editor" name="content">
            <p>Hello from CKEditor 5!</p>
        </textarea>

        <button type="submit">Submit</button>
    </form>

    <!-- CKEditor dependencies -->
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
            .create(document.querySelector('#editor'), {
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
    </script>
</body>
</html>