<?php
session_start();

// ✅ Same correct answers based on quiz.php
$correctAnswers = [
    1 => "4",
    2 => "8",
    3 => "C",
    4 => "5",
    5 => "Mango",
    6 => "9",
    7 => "2",
    8 => "Blue",
    9 => "7",
    10 => "Dog"
];

$userAnswers = $_SESSION['answers'] ?? [];
$score = 0;
$perQuestion = 10; // 10 questions = 100 score total

foreach ($correctAnswers as $qNo => $rightAns) {
    if (isset($userAnswers[$qNo]) && $userAnswers[$qNo] === $rightAns) {
        $score += $perQuestion;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>IQ Test - Result</title>
<style>
  body {
      margin: 0;
      padding: 0;
      background: #0d0d0d;
      color: #e6e6e6;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
      padding-top: 40px;
  }
  .result-container {
      background: rgba(20, 20, 20, 0.85);
      padding: 30px;
      border-radius: 15px;
      width: 90%;
      max-width: 900px;
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.25);
      backdrop-filter: blur(8px);
      animation: fadeIn 1s ease-in-out;
  }
  h1 {
      text-align: center;
      font-size: 2rem;
      margin-bottom: 20px;
      background: linear-gradient(90deg, #00eaff, #00ffff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
  }
  .score-box {
      text-align: center;
      font-size: 1.2rem;
      margin-bottom: 25px;
  }
  table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 25px;
  }
  th, td {
      padding: 12px;
      border-bottom: 1px solid #333;
      text-align: left;
      font-size: 0.95rem;
  }
  th {
      background: #1a1a1a;
  }
  .correct {
      color: #39ff14;
      font-weight: bold;
  }
  .wrong {
      color: #ff5555;
      font-weight: bold;
  }
  .btn {
      display: inline-block;
      padding: 12px 25px;
      background: #00eaff;
      color: #000;
      border-radius: 8px;
      font-weight: bold;
      text-decoration: none;
      transition: 0.3s;
  }
  .btn:hover {
      box-shadow: 0 0 20px rgba(0, 234, 255, 0.9);
  }
  @keyframes fadeIn {
      from { opacity: 0; transform: translateY(15px); }
      to { opacity: 1; transform: translateY(0); }
  }
</style>
</head>
<body>
<div class="result-container">
    <h1>Your IQ Test Result</h1>
    
    <div class="score-box">
        <p><strong>Your Score: <?php echo $score; ?>/100</strong></p>
    </div>
    
    <table>
        <tr>
            <th>Q#</th>
            <th>Your Answer</th>
            <th>Correct Answer</th>
            <th>Status</th>
        </tr>
        <?php foreach ($correctAnswers as $qNo => $rightAns): 
            $userAns = $userAnswers[$qNo] ?? "Not Answered";
            $isCorrect = ($userAns === $rightAns);
        ?>
        <tr>
            <td><?php echo $qNo; ?></td>
            <td><?php echo htmlspecialchars($userAns); ?></td>
            <td><?php echo htmlspecialchars($rightAns); ?></td>
            <td class="<?php echo $isCorrect ? 'correct' : 'wrong'; ?>">
                <?php echo $isCorrect ? '✔ Correct' : '✖ Wrong'; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <div style="text-align: center;">
        <a class="btn" href="index.php">Retake Test</a>
    </div>
</div>
</body>
</html>

<?php
session_destroy();
?>
