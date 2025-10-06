<?php
// index.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IQ Test | Start Your Assessment</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      background: #0d0d0d;
      color: #e6e6e6;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
    }

    .container {
      text-align: center;
      padding: 40px;
      background: rgba(20, 20, 20, 0.85);
      border-radius: 15px;
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.25);
      max-width: 600px;
      width: 90%;
      backdrop-filter: blur(8px);
      animation: fadeIn 1.2s ease-in-out;
    }

    h1 {
      font-size: 2.5rem;
      margin-bottom: 20px;
      background: linear-gradient(90deg, #00eaff, #00ffff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    p {
      font-size: 1.05rem;
      line-height: 1.6;
      margin-bottom: 30px;
      color: #cccccc;
    }

    .start-btn {
      display: inline-block;
      padding: 14px 35px;
      font-size: 1.1rem;
      font-weight: bold;
      background: #00eaff;
      color: #000;
      border-radius: 8px;
      text-decoration: none;
      box-shadow: 0 0 12px rgba(0, 234, 255, 0.7), 0 0 40px rgba(0, 234, 255, 0.3);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      cursor: pointer;
    }

    .start-btn:hover {
      transform: scale(1.05);
      box-shadow: 0 0 20px rgba(0, 234, 255, 0.9), 0 0 60px rgba(0, 234, 255, 0.4);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 480px) {
      h1 {
        font-size: 2rem;
      }
      p {
        font-size: 0.95rem;
      }
      .start-btn {
        padding: 12px 28px;
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>IQ Test</h1>
    <p>
      Measure your logical reasoning, pattern recognition, and problem-solving
      abilities with our professional IQ assessment. The test features 10
      questions designed to challenge and evaluate your cognitive strengths.
    </p>
    <a class="start-btn" onclick="redirectToQuiz()">Start Test</a>
  </div>

  <script>
    function redirectToQuiz() {
      window.location.href = "quiz.php"; // JS-based redirection only
    }
  </script>
</body>
</html>
