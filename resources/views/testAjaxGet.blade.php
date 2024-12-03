<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AJAX Table</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
</head>
<body>
    <h1>Tests Table</h1>
    <table border="1" id="tests-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>description</th>
                <th>price</th>
                <th>stock</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            
        </tbody>

    </table>
    <button onclick="deleteItem()" type="submit"></button>

    <script>
        $(document).ready(function(){
            $.ajax({
                url: '/test',
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    let rows='';
                    data.forEach(function(item){
                        rows+=` 
                            <tr id="row-${item.id}"> 
                                <td> ${item.name} </td>
                                <td> ${item.description} </td>
                                <td> ${item.price} </td>
                                <td> ${item.stock} </td>
                                <td> 
                                    <a href="/test/${item.id}/edit" style="text-decoration:none; background-color:yellow  ">Edit</a>
                                    <button onclick="deleteItem(${item.id})" style="background-color:green ">Delete</button>
                                </td>
                                
                            </tr>
                        `;
                    });

                    $('#tests-table tbody').html(rows);
                },

                error: function(){
                    alert('Recored could not be fetched');
                }
            });
        });


        function deleteItem(itemId) {

            $.ajax({
                url: `/test/${itemId}`,
                type: 'DELETE',

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(response) {
                    $(`#row-${itemId}`).remove(); 
                },
                error: function() {
                    alert('Could not delete the record.');
                }
            });
        }

    </script> 




     

</body>
</html>
