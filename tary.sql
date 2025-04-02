CREATE TABLE complaints (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  category VARCHAR(50) NOT NULL,
  text TEXT NOT NULL,
  status ENUM('pending', 'processed') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);