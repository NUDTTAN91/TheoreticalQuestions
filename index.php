<?php
// 判断表单是否被提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取用户选择的答案
    $answer = isset($_POST['ansible_module']) ? $_POST['ansible_module'] : '';

    // 定义正确答案
    $correct_answer = 'Web';

    // 检查答案是否正确
    $result = '';
    if ($answer === $correct_answer) {
        $result = "恭喜你，答对了！";
    } else {
        $result = "很遗憾，答错了。正确答案是：欸嘿~不告诉你";
    }
}

// 选项数组
$options = array(
    'A' => 'Web',
    'B' => 'Misc',
    'C' => 'Crypto',
    'D' => 'PWN'
);

// 打乱选项描述
$descriptions = $options;
shuffle($descriptions);

// 重新组合选项
$shuffled_options = array_combine(array_keys($options), $descriptions);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>单项选择题</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="gradient-background">
    <div class="container">
        <h1>你知道CTF吗？</h1>
        <form id="myForm" action="" method="post">
            <div class="question">
                <?php foreach ($shuffled_options as $key => $description): ?>
                    <input type="radio" id="<?php echo $key; ?>" name="ansible_module" value="<?php echo $description; ?>" required>
                    <label for="<?php echo $key; ?>"><?php echo $key . '. ' . $description; ?></label>
                <?php endforeach; ?>
            </div>
            <input type="submit" value="提交答案" class="submit-button">
        </form>

        <?php if (isset($result)): ?>
            <div class="result"><?php echo $result; ?></div>
        <?php endif; ?>
    </div>
</div>

<footer>
    <p>&copy; 2024 <a href="https://github.com/nudttan91" target="_blank">tan91</a>. All rights reserved.</p>
</footer>

</body>
</html>