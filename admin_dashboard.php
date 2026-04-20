<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <main>
        <section>
            <h2>Search Equipment</h2>
            <form id="searchForm" method="get">
                <input type="text" name="search" placeholder="Search for equipment..." required>
                <button type="submit">Search</button>
            </form>
        </section>
        <section>
            <h2>Equipment Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Rows will be populated dynamically -->
                </tbody>
            </table>
        </section>
    </main>
    <footer>
        <p>&copy; 2026 Asset Manager</p>
    </footer>
</body>
</html>