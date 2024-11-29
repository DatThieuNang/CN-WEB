<?php
$quizFilePath = 'CauHoi.txt';
$quizContent = file_get_contents($quizFilePath);

$questionBlocks = explode("ANSWER:", $quizContent);

$quizQuestions = [];
$quizAnswers = [];

foreach ($questionBlocks as $blockIndex => $blockContent) {
    $lines = explode("\n", trim($blockContent));

    if (count($lines) > 1) {
        $quizQuestions[] = array(
            'questionText' => trim($lines[0]),
            'choices' => array_slice($lines, 1, 4), 
            'correctAnswer' => trim(end($lines)) 
        );
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hỏi xoay đáp xoáy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="quiz-container">
            <h1 class="text-center mb-5">Câu Hỏi</h1>

            <form method="POST" action="KetQua.php">
                <?php foreach ($quizQuestions as $questionIndex => $question): ?>
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header bg-info text-white">
                            <strong>Câu hỏi <?php echo $questionIndex + 1; ?>:</strong> <?php echo $question['questionText']; ?>
                        </div>
                        <div class="card-body">
                            <?php foreach ($question['choices'] as $choice): ?>
                                <?php
                                    $choiceLetter = substr($choice, 0, 1); 
                                    $choiceText = substr($choice, 3); 
                                ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question_<?php echo $questionIndex; ?>" value="<?php echo $choiceLetter; ?>" id="question_<?php echo $questionIndex . $choiceLetter; ?>">
                                    <label class="form-check-label" for="question_<?php echo $questionIndex . $choiceLetter; ?>">
                                        <?php echo $choiceText; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">Nộp bài</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
