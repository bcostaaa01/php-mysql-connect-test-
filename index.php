<html>

<head>
    <title>MySQL connect template</title>
</head>

<body>
    <h1>MySQL connect template</h1>
    <?php
// MySQL database credentials
$host = 'hostname';
$username = 'username';
$password = 'password';
$dbname = 'dbname';

try {
    $dsn = "mysql:host=$host;dbname=$dbname";
    $pdo = new PDO($dsn, $username, $password);
    echo "Connected to the database successfully.";

    // Retrieve data from the table
    $sql = 'SELECT * FROM table_name';
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output the data in the UI
    if (count($result) > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Name</th>';
        foreach ($result as $row) {
            echo '<tr>';
            echo '<td>' . $row . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No data found.';
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
</body>

</html>