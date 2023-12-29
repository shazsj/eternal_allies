<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Feedback Form</title>
    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
if (isset($_POST["SubmitButton"])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $message = $_POST['message'];

    include_once "dbconnect.php";

    if ($conn) {
        $stmt = $conn->prepare("INSERT INTO feedback (fname, lname, email, mobile, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fname, $lname, $email, $mobile, $message);
        $execval = $stmt->execute();

        if ($execval) {
            echo "Feedback submitted successfully...";
            header("Location: landingpage.php"); // Replace "landing_page.php" with the actual landing page URL
            exit(); // Ensure that no further code is executed after the redirect
        } else {
            echo "Error during feedback submission: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Database connection error.";
    }
}
?>
<style>
    .bg-light {
        background-color: rgba(255, 255, 255, 0.7); /* Adjust the alpha value (0.7) for the desired transparency */
        padding: 5rem;
        border-radius: 0.5rem;
        margin-top: 3rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    body {
        background-image: url('./uploads/1.svg'); /* Replace '1' with the actual image filename and extension */
        background-size: cover; /* Adjust as needed */
        background-repeat: no-repeat;
        background-position: center center;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0; /* Remove default margin */
    }

    .form-group {
        width: 100%;
    }

    .btn-user {
        width: 100%;
    }
</style>
<body>
    <main class="container">
        <div class="bg-light p-5 rounded mt-3">
            <div class="col-lg-7">
                <div class="p-5">
                <div class="mb-4">
                        <h2 class="text-uppercase">Tell us your experience...</h2>
                    </div>
                    <form class="user" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group row mb-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name"
                                    required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name"
                                    required>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email Address" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="tel" class="form-control form-control-user" id="mobile" name="mobile"
                                placeholder="Mobile Number">
                        </div>
                        <div class="form-group mb-3">
                            <textarea class="form-control form-control-user" id="message" name="message"
                                placeholder="Enter Feedback Message" required></textarea>
                        </div>
                        <button type="submit" id="SubmitButton" name="SubmitButton"
                            class="btn btn-primary btn-user btn-block">
                            Submit Feedback
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <?php if (!empty($posted_payloads)) { ?>
            <div class="card-header">
                <div class="alert alert-info">
                    <?php echo "<pre>"; print_r($posted_payloads); ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </main>
</body>

</html>
