<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto text-center">
        <form id="loginForm" onsubmit="return validateForm()">
            <img class="mb-4" src="https://media.tenor.com/RnruYyanj-kAAAAM/spinning-cat.gif" alt="Logo" width="100" height="80">

            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="Email address">
                <label for="floatingInput">Email address</label>
                <small id="emailError" class="text-danger d-none">Email is required.</small>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
                <small id="passwordError" class="text-danger d-none">Password is required.</small>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
    </main>
</body>

<style>
    html,
    body {
        height: 100%;
    }

    .form-signin {
        max-width: 330px;
        padding: 1rem;
        background-color: brown;
        border-radius: 8px;
        box-shadow: 0px 4px 6px black(0, 0, 0, 0.1);
    }

    .form-control {
        height: 50px;
        border-radius: 8px;
        font-size: 16px;
    }

    .btn-primary {
        background-color: blue;
        border: none;
        font-size: 16px;
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: lightblue;
    }

    body {
        background-color: white;
    }

    .text-danger {
        font-size: 14px;
        margin-top: 5px;
        display: block;
    }

    .d-none {
        display: none;
    }
</style>

<script>
    function validateForm() {
        const emailInput = document.getElementById('floatingInput');
        const passwordInput = document.getElementById('floatingPassword');
        const emailError = document.getElementById('emailError');
        const passwordError = document.getElementById('passwordError');

        let isValid = true;

        if (emailInput.value.trim() === '') {
            emailError.classList.remove('d-none');
            isValid = false;
        } else {
            emailError.classList.add('d-none');
        }

        if (passwordInput.value.trim() === '') {
            passwordError.classList.remove('d-none');
            isValid = false;
        } else {
            passwordError.classList.add('d-none');
        }

        return isValid;
    }
</script>