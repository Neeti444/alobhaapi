<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #f1f8ff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #e17474, #2b8f6a);  
            color: white;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-success {
            background: linear-gradient(to right, #e17474, #2b8f6a);   
            border: none;
        }

        .btn-success:hover {
            background: linear-gradient(to right, #00cec9, #2b8f6a);
        }

        @media (max-width: 576px) {
            .card-body {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h4 class="mb-0">Job Application Form</h4>
        </div>
        <div class="card-body px-4 py-5">
            <form action="{{ route('information.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Post Applied</label>
                        <input type="text" class="form-control" name="post_applied" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="dob">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Contact</label>
                        <input type="text" class="form-control" name="contact">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Expected CTC</label>
                        <input type="number" class="form-control" name="expected_ctc">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Current CTC</label>
                        <input type="number" class="form-control" name="current_ctc">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Notice Period</label>
                        <input type="text" class="form-control" name="notice_period">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Total Experience</label>
                        <input type="text" class="form-control" name="total_exp">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Previous Companies</label>
                        <select class="form-select" name="name_of_company[]" >
                            <option value="Alobha">Alobha</option>
                            <option value="TCS">TCS</option>
                            <option value="Wipro">Wipro</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Qualifications</label>
                        <select class="form-select" name="qualification[]" >
                            <option value="B.Tech">B.Tech</option>
                            <option value="MCA">MCA</option>
                            <option value="MBA">MBA</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Strengths</label>
                        <input type="text" class="form-control" name="strengths">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Improvement Areas</label>
                        <input type="text" class="form-control" name="improvement">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Reason for Leaving Last Company</label>
                        <input type="text" class="form-control" name="leaving_reason">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Achievements in Last Company</label>
                        <input type="text" class="form-control" name="ach_last_com">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Future Goals</label>
                        <input type="text" class="form-control" name="future_add">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Reference</label>
                        <input type="text" class="form-control" name="reference">
                    </div>

                    <div class="col-12 d-grid mt-4">
                        <button type="submit" class="btn btn-success btn-lg">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
