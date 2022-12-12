<?php
include('connection.php');
include('header.php');
?>

    <div class="container-fluid px-4">
        <h2 class="mt-4">Wisteria Plant Admin Panel</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item">Admin</li>
        </ol>
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Registered Admin</h4>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                        <thread>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thread>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
    </div>




<?php 
include('footer.php'); 
include('scripts.php');
?>