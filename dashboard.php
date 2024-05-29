<?php
include 'db_config.php';

// Fetch data from the database
$sql = "SELECT id, uname, uemail, uphone, umsg FROM rex_ecom_requests";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <title>Requests Dashboard</title>
</head>
<body>
    <nav class="navbar background h-nav-resp">
        <ul class="nav-list v-class-resp">
            <div class="logo"><img src="macbook_laptop_with_iphone_coffee_038_journal_596600.jpg" alt="logo"></div>
            <li><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="dashboard.php">Portal</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
        <div class="rightNav v-class-resp">
            <input type="text" name="search" id="search">
            <button class="btn btn-sm">Search</button>
        </div>
        <div class="burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </nav>

    <div class="show-requests">
        <h1>RexEcom Requests Dashboard</h1>
        <table class="request-table">
            <tr>
                <th>Request ID</th>
                <th>Requester Name</th>
                <th>Requester Email</th>
                <th>Requester Phone</th>
                <th>Requester Concern</th>
            </tr>
            <?php
            include 'db_config.php';
            $sql = "SELECT id, uname, uemail, uphone, umsg FROM rex_ecom_requests";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['uname']); ?></td>
                        <td><?php echo htmlspecialchars($row['uemail']); ?></td>
                        <td><?php echo htmlspecialchars($row['uphone']); ?></td>
                        <td><?php echo htmlspecialchars($row['umsg']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No requests found</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <footer class="background">
        <p class="text-footer">
        Chaudary Ki University Hai Achi Hi Ho Gi
        </p>
    </footer>
    <script src="resp.js"></script>
</body>
</html>

<?php
$conn->close();
?>
