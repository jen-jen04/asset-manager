-- Create database
CREATE DATABASE IF NOT EXISTS asset_manager;
USE asset_manager;

-- Create admin_tbl
CREATE TABLE IF NOT EXISTS admin_tbl (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Hashed password
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Create guest_tbl
CREATE TABLE IF NOT EXISTS guest_tbl (
    guest_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Hashed password
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Create equipment_resources
CREATE TABLE IF NOT EXISTS equipment_resources (
    equipment_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    availability_status BOOLEAN NOT NULL DEFAULT TRUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Create reservations
CREATE TABLE IF NOT EXISTS reservations (
    reservation_id INT AUTO_INCREMENT PRIMARY KEY,
    guest_id INT NOT NULL,
    equipment_id INT NOT NULL,
    reservation_date DATETIME,
    FOREIGN KEY (guest_id) REFERENCES guest_tbl(guest_id),
    FOREIGN KEY (equipment_id) REFERENCES equipment_resources(equipment_id)
);

-- Create audit_log
CREATE TABLE IF NOT EXISTS audit_log (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    action VARCHAR(255) NOT NULL,
    action_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    performer_id INT,
    FOREIGN KEY (performer_id) REFERENCES admin_tbl(admin_id)
);

-- Sample data insertion
INSERT INTO admin_tbl (username, password) VALUES ('admin', SHA2('admin123', 256));
INSERT INTO guest_tbl (username, password) VALUES ('guest1', SHA2('guest123', 256));
INSERT INTO equipment_resources (name) VALUES ('Projector'), ('Whiteboard'), ('Conference Room');
INSERT INTO reservations (guest_id, equipment_id, reservation_date) VALUES (1, 1, '2026-04-20 10:00:00');
INSERT INTO audit_log (action, performer_id) VALUES ('Created guest1', 1);