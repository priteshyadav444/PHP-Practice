<?php
function cleanStr($string)
{
    // Replaces all spaces with hyphens.
    $string = str_replace(' ', '-', $string);
    // Removes special chars.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    // Replaces multiple hyphens with single one.

    return $string;
}

function countWords($paragraph)
{
    $paragraph = cleanStr($paragraph);
    $words = explode("-", $paragraph);
    $wordCounts = array();
    foreach ($words as $word) {
        if ($word == "" && $word == null)
            continue;
        $wordCounts[$word] = substr_count($paragraph, $word);
    }
    arsort($wordCounts);
    return $wordCounts;
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <form acton="#" method="POST">
        <textarea id="w3review" name="paragraph" rows="4" cols="50">
At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.
    </textarea>
        <input type="submit" name="submit" />
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $paragraph = strval($_POST['paragraph']);
        //print_r($paragraph);
        $results = countWords($paragraph);
        echo "<pre>";
        echo ucwords($paragraph);
        print_r($results);
        echo "</pre>";
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>