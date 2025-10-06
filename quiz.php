<?php
session_start();

// ✅ Simple & easy questions
$questions = [
    1 => ["question" => "What is 2 + 2?", "options" => ["3", "4", "5", "6"]],
    2 => ["question" => "Which number is even?", "options" => ["5", "7", "8", "9"]],
    3 => ["question" => "What comes after B?", "options" => ["A", "C", "D", "E"]],
    4 => ["question" => "What is 10 - 5?", "options" => ["2", "5", "7", "9"]],
    5 => ["question" => "Which is a fruit?", "options" => ["Car", "Mango", "Chair", "Pen"]],
    6 => ["question" => "What is 3 x 3?", "options" => ["6", "9", "3", "12"]],
    7 => ["question" => "Which is the smallest?", "options" => ["2", "5", "9", "7"]],
    8 => ["question" => "What color is the sky?", "options" => ["Red", "Blue", "Green", "Black"]],
    9 => ["question" => "How many days in a week?", "options" => ["5", "6", "7", "8"]],
    10 => ["question" => "Which one is an animal?", "options" => ["Dog", "Book", "Phone", "Shoe"]],
];

// ✅ Get current question
$current = isset($_GET['q']) ? intval($_GET['q']) : 1;
if ($current < 1) { $current = 1; }

// ✅ Save previous answer
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prevQ = $_POST['question_no'];
    $selected = $_POST['answer'] ?? null;
    $_SESSION['answers'][$prevQ] = $selected;
}

// ✅ Redirect using JS (No PHP header)
if (isset($_POST['next'])) {
    $nextQ = $current + 1;
    if ($nextQ > 10) {
        echo "<script>window.location.href = 'result.php';</script>";
        exit;
    } else {
        echo "<script>window.location.href = 'quiz.php?q=$nextQ';</script>";
        exit;
    }
}

// ✅ Current question data
$qData = $questions[$current];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>IQ Test - Question <?php echo $current; ?></title>
<style>
  body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: #0d0d0d;
      color: #e6e6e6;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
  }
  .quiz-container {
      background: rgba(20, 20, 20, 0.85);
      padding: 30px;
      border-radius: 15px;
      width: 90%;
      max-width: 600px;
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.25);
      backdrop-filter: blur(8px);
      animation: fadeIn 1s ease-in-out;
  }
  h2 {
      margin-bottom: 20px;
      font-size: 1.5rem;
      background: linear-gradient(90deg, #00eaff, #00ffff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
  }
  .option {
      margin: 10px 0;
      padding: 10px;
      background: #1a1a1a;
      border-radius: 8px;
      cursor: pointer;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      border: 1px solid #333;
  }
  .option:hover {
      transform: scale(1.02);
      box-shadow: 0 0 15px rgba(0, 234, 255, 0.4);
  }
  input[type="radio"] {
      margin-right: 10px;
  }
  .btn {
      margin-top: 20px;
      padding: 12px 30px;
      background: #00eaff;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: bold;
      color: #000;
      cursor: pointer;
      transition: 0.3s;
  }
  .btn:hover {
      box-shadow: 0 0 20px rgba(0, 234, 255, 0.9);
  }
  .progress {
      margin-bottom: 15px;
      font-size: 0.9rem;
      color: #aaaaaa;
  }
  @keyframes fadeIn {
      from { opacity: 0; transform: translateY(15px); }
      to { opacity: 1; transform: translateY(0); }
  }
</style>
</head>
<body>
<div class="quiz-container">
    <div class="progress">Question <?php echo $current; ?> of 10</div>
    <h2><?php echo $qData["question"]; ?></h2>

    <form method="post">
        <?php foreach ($qData["options"] as $option) : ?>
            <label class="option">
                <input type="radio" name="answer" value="<?php echo $option; ?>" required>
                <?php echo $option; ?>
            </label>
        <?php endforeach; ?>

        <input type="hidden" name="question_no" value="<?php echo $current; ?>">
        <button type="submit" name="next" class="btn">
            <?php echo ($current == 10) ? "Finish" : "Next"; ?>
        </button>
    </form>
</div>
</body>
</html>
