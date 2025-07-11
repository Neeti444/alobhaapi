<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Information Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8;
        }
        .table thead {
            background-color: #2b8f6a;
            color: white;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <h2 class="text-center mb-4">Job Application</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Post</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Exp. CTC</th>
                <th>Curr. CTC</th>
                <th>Notice</th>
                <th>Experience</th>
                <th>Company</th>
                <th>Qualification</th>
                <th>Address</th>
                <th>Strengths</th>
                <th>Improvement</th>
                <th>Reason</th>
                <th>Achievements</th>
                <th>Goals</th>
                <th>Reference</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lists as $key => $app)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $app->post_applied }}</td>
                <td>{{ $app->name }}</td>
                <td>{{ $app->dob }}</td>
                <td>{{ $app->contact }}</td>
                <td>{{ $app->email }}</td>
                <td>{{ $app->expected_ctc }}</td>
                <td>{{ $app->current_ctc }}</td>
                <td>{{ $app->notice_period }}</td>
                <td>{{ $app->total_exp }}</td>
                <td>{{ $app->name_of_company }}</td>
                <td>{{ $app->qualification }}</td>
                <td>{{ $app->address }}</td>
                <td>{{ $app->strengths }}</td>
                <td>{{ $app->improvement }}</td>
                <td>{{ $app->leaving_reason }}</td>
                <td>{{ $app->ach_last_com }}</td>
                <td>{{ $app->future_add }}</td>
                <td>{{ $app->reference }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
