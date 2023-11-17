<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #343a40;
            color: white;
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('/admin/dashboard')}}">
                            Trend-Topics Admin 
                        </a>
                    </li><br>
                    
                     <li class="nav-item">
                        <a class="nav-link active" href="{{url('/admin/dashboard')}}">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/add-blog')}}">
                            Add a Blog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/blog-list')}}">
                            Blog List
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/add-category')}}">
                            Add a Category
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/customer-querys')}}" >
                            Customer Query List
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/new-users')}}">
                            New Users List
                        </a>
                    </li><br><br><br><br><br><br>

                     <li class="nav-item">
                        <a class="nav-link active">
                          Welcome,  Admin
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link active" href="#">
                         Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="content" id="main-content">