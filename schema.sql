CREATE DATABASE IF NOT EXISTS crictactix;
USE crictactix;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    tactical_score INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE match_scenarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    match_name VARCHAR(100),
    over_number DECIMAL(4,1),
    situation_desc TEXT,
    captain_bowler VARCHAR(50),
    captain_field VARCHAR(50),
    base_merit_score INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE user_decisions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    scenario_id INT,
    chosen_bowler VARCHAR(50),
    chosen_field VARCHAR(50),
    awarded_points INT,
    decision_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (scenario_id) REFERENCES match_scenarios(id) ON DELETE CASCADE
);

-- Insert sample scenario for Hackathon Demo
INSERT INTO match_scenarios (match_name, over_number, situation_desc, captain_bowler, captain_field, base_merit_score) 
VALUES ('CSK vs MI - IPL Final', 14.0, 'Opponent is 120/3. Hard hitters at the crease. Need a breakthrough or tight over.', 'Bumrah', 'Defensive', 100);
