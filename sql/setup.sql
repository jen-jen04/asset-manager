-- SQL Schema for Asset Manager Database

CREATE TABLE IF NOT EXISTS admin_tbl (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Example hashed password: $2y$10$eImiTXuWVxfN7IHOtG0mua3N3RrRcd5ILz2Vl2guzKstseY8KoeyS

CREATE TABLE IF NOT EXISTS guest_tbl (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Example hashed password: $2y$10$eImiTXuWVxfN7IHOtG0mua3N3RrRcd5ILz2Vl2guzKstseY8KoeyS

CREATE TABLE IF NOT EXISTS equipment_resources (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    type VARCHAR(50) NOT NULL,
    quantity INT NOT NULL,
    location VARCHAR(100),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Add additional necessary indexes and constraints as needed.
