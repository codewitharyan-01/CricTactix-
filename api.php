<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Hackathon Demo API - Simulating backend interaction
// In a real environment, this connects to the MySQL DB defined in schema.sql

$action = $_GET['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

if ($action === 'submit_decision') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Simulate database lookup for correct scenario
    $scenario = [
        'captain_bowler' => 'Bumrah',
        'captain_field' => 'Defensive',
        'base_merit_score' => 100
    ];
    
    $userBowler = $data['bowler'] ?? '';
    $userField = $data['field'] ?? '';
    
    $pointsEarned = 0;
    $feedback = [];
    
    if ($userBowler === $scenario['captain_bowler']) {
        $pointsEarned += 50;
        $feedback[] = "Excellent choice of bowler! Matches the captain's move.";
    } else {
        $feedback[] = "Captain chose {$scenario['captain_bowler']}. Your bowler was a riskier bet.";
    }
    
    if ($userField === $scenario['captain_field']) {
        $pointsEarned += 50;
        $feedback[] = "Perfect field placement for the situation.";
    } else {
        $feedback[] = "Captain opted for a {$scenario['captain_field']} field to control the run rate.";
    }
    
    // In a real app, we would insert this into `user_decisions` table and update user's `tactical_score`
    
    echo json_encode([
        'success' => true,
        'points_earned' => $pointsEarned,
        'captain_bowler' => $scenario['captain_bowler'],
        'captain_field' => $scenario['captain_field'],
        'feedback' => $feedback,
        'new_total_score' => rand(1200, 1500) // Simulated updated score
    ]);
    exit;
}

if ($action === 'get_leaderboard') {
    // Simulate leaderboard
    echo json_encode([
        ['username' => 'CricGeek99', 'score' => 2450],
        ['username' => 'TacticalGuru', 'score' => 2310],
        ['username' => 'DhoniFan', 'score' => 2100],
        ['username' => 'YourProfile', 'score' => 1450]
    ]);
    exit;
}

echo json_encode(['error' => 'Invalid action']);
?>
