@extends('admin2.layout.main')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Basic Tables </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">View User</li>
            </ol>
        </nav>
    </div>

    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Inverse table</h4>
                    <p class="card-description"> Add class <code>.table-dark</code>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead class="table-primary">
                                <tr>
                                    <th> # </th>
                                    <th> First name </th>
                                    <th> Amount </th>
                                    <th> Deadline </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 1 </td>
                                    <td> Herman Beck </td>
                                    <td> $ 77.99 </td>
                                    <td> May 15, 2015 </td>
                                </tr>
                                <tr>
                                    <td> 2 </td>
                                    <td> Messsy Adam </td>
                                    <td> $245.30 </td>
                                    <td> July 1, 2015 </td>
                                </tr>
                                <tr>
                                    <td> 3 </td>
                                    <td> John Richards </td>
                                    <td> $138.00 </td>
                                    <td> Apr 12, 2015 </td>
                                </tr>
                                <tr>
                                    <td> 4 </td>
                                    <td> Peter Meggik </td>
                                    <td> $ 77.99 </td>
                                    <td> May 15, 2015 </td>
                                </tr>
                                <tr>
                                    <td> 5 </td>
                                    <td> Edward </td>
                                    <td> $ 160.25 </td>
                                    <td> May 03, 2015 </td>
                                </tr>
                                <tr>
                                    <td> 6 </td>
                                    <td> John Doe </td>
                                    <td> $ 123.21 </td>
                                    <td> April 05, 2015 </td>
                                </tr>
                                <tr>
                                    <td> 7 </td>
                                    <td> Henry Tom </td>
                                    <td> $ 150.00 </td>
                                    <td> June 16, 2015 </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        

    </div>
@endsection
