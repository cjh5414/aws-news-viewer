<?php include "../inc/dbinfo.inc"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>News Viewer</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="#">Home</a>
            <a class="btn btn-outline-secondary" href="#">Add News</a>
        </div>
    </nav>
    <!-- Masthead -->
    <header class="masthead text-white text-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="mb-5">Make your own news list!</h1>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <!-- Input form -->
                    <form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST" class="form">
                        <input type="text" name="title" class="form-control form-control-lg my-input" placeholder="Enter title...">
                        <input type="text" name="url" class="form-control form-control-lg my-input" placeholder="Enter url...">
                        <button type="submit" class="btn btn-block btn-lg btn-primary my-input">Add News!</button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <?php
/* Connect to MySQL and select the database. */
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

$database = mysqli_select_db($connection, DB_DATABASE);

/* Ensure that the News table exists. */
VerifyNewsTable($connection, DB_DATABASE);

/* If input fields are populated, add a row to the News table. */
$News_title = htmlentities($_POST['title']);
$News_url = htmlentities($_POST['url']);

if (strlen($News_title) && strlen($News_url)) {
    AddNews($connection, $News_title, $News_url);
}

$News_delete = htmlentities($_POST['delete']);
if (strlen($News_delete)) {
    deleteNews($connection, $News_delete);
}
?>

    <!-- Testimonials -->
    <section class="testimonials text-center bg-light">
        <div class="container">
            <!-- Display table data. -->

            <form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST" class="form">
                <div class="input-group col-md-6 my-input">
                    <input type="search" name="query" class="form-control input-group-sm py-2 border-right-0 border" placeholder="search..">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary border" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">URL</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
<?php
$News_query = htmlentities($_POST['query']);

if (strlen($News_query)) {
    $result = mysqli_query($connection, "SELECT * FROM News WHERE Title LIKE '%" . $News_query . "%'");
}
else {
    $result = mysqli_query($connection, "SELECT * FROM News");
}

while($query_data = mysqli_fetch_row($result)) {
    echo "<tr>";
    echo "<th>",$query_data[0], "</th>",
        "<td>",$query_data[1], "</td>",
        "<td><a href=\"$query_data[2]\">",$query_data[2], "</a></td>";
    echo "<td><form action=\"" . $_SERVER['SCRIPT_NAME'] . "\" method=\"POST\"><input type=\"text\" name=\"delete\" value=\"" . $query_data[0] . "\" hidden><button type=\"submit\"class=\"close\"><span>&times;</span></button></form></td>";
    echo "</tr>";
}

?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item">
                            <a href="#">About</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Contact</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Terms of Use</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Privacy Policy</a>
                        </li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2018. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-3">
                            <a href="#">
                                <i class="fab fa-facebook fa-2x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mr-3">
                            <a href="#">
                                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fab fa-instagram fa-2x fa-fw"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Clean up. -->
    <?php
    mysqli_free_result($result);
    mysqli_close($connection);
?>

</body>

</html>


<?php
/* Add an News to the table. */
function AddNews($connection, $title, $url) {
    $n = mysqli_real_escape_string($connection, $title);
    $a = mysqli_real_escape_string($connection, $url);

    $query = "INSERT INTO `News` (`Title`, `Url`) VALUES ('$n', '$a');";

    if(!mysqli_query($connection, $query)) echo("<p>Error adding News data.</p>");
}

/* delete an News from the table. */
function deleteNews($connection, $delete) {
    $d = mysqli_real_escape_string($connection, $delete);

    $query = "DELETE FROM `News` WHERE id = $d;";

    if(!mysqli_query($connection, $query)) echo("<p>Error adding News data.</p>");
}

/* Check whether the table exists and, if not, create it. */
function VerifyNewsTable($connection, $dbName) {
    if(!TableExists("News", $connection, $dbName))
    {
        $query = "CREATE TABLE `News` (
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `Title` varchar(90) DEFAULT NULL,
            `Url` varchar(90) DEFAULT NULL,
            PRIMARY KEY (`ID`),
            UNIQUE KEY `ID_UNIQUE` (`ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";

        if(!mysqli_query($connection, $query)) echo("<p>Error creating table.</p>");
    }
}

/* Check for the existence of a table. */
function TableExists($tableName, $connection, $dbName) {
    $t = mysqli_real_escape_string($connection, $tableName);
    $d = mysqli_real_escape_string($connection, $dbName);

    $checktable = mysqli_query($connection,
        "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");

    if(mysqli_num_rows($checktable) > 0) return true;

    return false;
}
?>