-- Insert data into Role table
INSERT INTO Role (role_id, role_name) VALUES
(1, 'Customer'),
(2, 'Admin');

-- Insert data into User table
INSERT INTO Users (user_id, username, password, email, address, role_id) VALUES
(1, 'john_doe', 'hashed_password', 'john@example.com', '123 Main St', 1),
(2, 'admin_user', 'admin_password', 'admin@example.com', '456 Admin St', 2);

-- Insert data into Product table
INSERT INTO Product (product_id, name, description, price, cost_price, stock_quantity) VALUES
(1, '3D Printer Model A', 'High-quality 3D printer', 999.99, 799.99, 50),
(2, '3D Filament - Red', 'PLA filament for 3D printing', 29.99, 19.99, 100),
(3, '3D Printing Pen', 'Creative tool for 3D doodling', 49.99, 39.99, 30);

-- Insert data into Order table
INSERT INTO Orders (order_id, user_id, order_date) VALUES
(1, 1, '2024-01-20 12:00:00'),
(2, 1, '2024-01-21 14:30:00'),
(3, 2, '2024-01-22 10:45:00');

-- Insert data into OrderDetail table
INSERT INTO OrderDetail (order_detail_id, order_id, product_id, quantity, total_price) VALUES
(1, 1, 1, 2, 1999.98),
(2, 1, 2, 5, 149.95),
(3, 2, 3, 1, 49.99),
(4, 3, 1, 1, 999.99);
