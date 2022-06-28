<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1>Read Admins </h1>
            <br>

            {{  'Welcome , '.auth()->user()->name }}
            <br>

            @include('messages')

        </div>

        <a href="{{url('Admins/Create')}}" class='btn btn-primary m-r-1em' >+ Account</a>   <a href="{{url('Logout')}}" class='btn btn-primary m-r-1em' >Logout</a>

        <br>

        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>image</th>

                <th>action</th>
            </tr>


            @foreach ($data as $key => $admin)
                <tr>

                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td><img src="{{url('images/admins/'.$admin->image)}}"  width="80px" height="80px" ></td>

                    <td>

                        <a href='{{url('Admins/Delete/'.$admin->id)}}' class='btn btn-danger m-r-1em'>Remove Raw</a>

                        <a href='{{ url('Admins/Edit/' . $admin->id) }}' class='btn btn-primary m-r-1em'>Update Raw</a>
                    </td>
                </tr>

            @endforeach
            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>
