// api/complaints.php
header("Content-Type: application/json");

// MySQL қосылу
$conn = new mysqli("localhost", "user", "password", "complaints_db");

// Жаңа шағым қабылдау
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);
  $stmt = $conn->prepare("INSERT INTO complaints (name, phone, category, text) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $data['name'], $data['phone'], $data['category'], $data['text']);
  $stmt->execute();
  echo json_encode(["status" => "success", "id" => $conn->insert_id]);
}

// Админге шағымдар тізімін беру
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $result = $conn->query("SELECT * FROM complaints ORDER BY created_at DESC");
  echo json_encode($result->fetch_all(MYSQLI_ASSOC));
}

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");