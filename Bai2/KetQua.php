<?php
$quizFilePath = 'CauHoi.txt'; 
$quizContent = file_get_contents($quizFilePath);

$questionBlocks = explode("ANSWER:", $quizContent); 

$quizQuestions = [];
$userAnswers = $_POST;

foreach ($questionBlocks as $blockIndex => $blockContent) {
    $lines = explode("\n", trim($blockContent));

    if (count($lines) > 1) {
        $quizQuestions[] = [
            'questionText' => trim($lines[0]), 
            'choices' => array_slice($lines, 1, 4),
            'correctAnswer' => trim(end($lines)) 
        ];
    }
}

$score = 0;
foreach ($quizQuestions as $questionIndex => $question) {
    $userAnswerKey = "question_$questionIndex"; 
    if (isset($userAnswers[$userAnswerKey]) && $userAnswers[$userAnswerKey] === $question['correctAnswer']) {
        $score++; 
    }
}

$totalQuestions = count($quizQuestions); 
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Trắc Nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="result-container">
            <h1 class="text-center mb-4">Kết Quả Của Bạn</h1>
            <div class="alert alert-info text-center">
                <strong>Bạn đã trả lời đúng <?php echo $score; ?> trên <?php echo $totalQuestions; ?> câu hỏi.</strong>
            </div>
            <div class="text-center">
                <p><strong>Tỷ lệ chính xác: <?php echo round(($score / $totalQuestions) * 100, 2); ?>%</strong></p>
                <a href="index.php" class="btn btn-success">Làm lại</a>
            </div>
        </div>
    </div>
</body>
</html>
