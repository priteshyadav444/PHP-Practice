<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="assets/js/bootbox.min.js"></script> -->
</head>

<body>
    <!-- As a heading -->

    @include('layout.navbar')
    <div class="container">
        <form action="{{ route('student.store') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Name</label>
                    <input type="name" class="form-control" id="inputPassword4" name="name" placeholder="Enter Name" value="Pritesh" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Enter Email" value="abca@mail.com" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St" value="Millat Nagar">
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputZip">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" checked value="male">
                        <label class="form-check-label ml-5" for="flexRadioDefault1">
                            Male
                        </label>
                        <input class="form-check-input ml-2" type="radio" name="gender" id="flexRadioDefault2" value="female">
                        <label class="form-check-label ml-5" for="flexRadioDefault2">
                            Female
                        </label>
                    </div>

                </div>
                <div class="form-group col-md-2">
                    <label for="inputState">Qualification</label>
                    <select id="inputState" class="form-control" name="qualification" required>
                        <option selected value="">Choose...</option>
                        <option value="bca">BCA</option>
                        <option value="bcom">BCOM</option>
                        <option value="bsc">BSC</option>
                    </select>
                </div>

                <div class="form-group col-md-7">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="hobbies[]" value="cricket">
                    <label class="form-check-label" for="flexCheckDefault">
                        Cricket
                    </label>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="hobbies[]" value="vollyball">
                    <label class="form-check-label" for="flexCheckChecked">
                        Vollyball
                    </label>
                </div>

            </div>
    </div>
    <button type="submit" class="btn btn-primary" value="submit" name="submit">submit</button>
    </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="delete.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js" integrity="sha512-oVbWSv2O4y1UzvExJMHaHcaib4wsBMS5tEP3/YkMP6GmkwRJAa79Jwsv+Y/w7w2Vb/98/Xhvck10LyJweB8Jsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>
</body>

</html>