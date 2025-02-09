/*First create table named blissful_events then copy and past the below codes */
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL, 
    user_type ENUM('client', 'admin') NOT NULL,
    email VARCHAR(255)
);

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    event_type VARCHAR(255),
    event_term ENUM('short_term', 'moderate_term', 'long_term'),
    catering BOOLEAN,
    event_planner BOOLEAN,
    dj_mc BOOLEAN,
    cost DECIMAL(10, 2),
    event_date DATE,
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES users(id)
);