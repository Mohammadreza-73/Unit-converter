<?php require './src/process.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit Converter</title>
    <link rel="stylesheet" href="./src/assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Unit Converter</h1>
        <form method="post">
            <div class="form-group">
                <label for="conversion_type">Conversion Type:</label>
                <select name="conversion_type" id="conversion_type" onchange="this.form.submit()">
                    <option value="length" <?= $conversionType === 'length' ? 'selected' : '' ?>>Length</option>
                    <option value="weight" <?= $conversionType === 'weight' ? 'selected' : '' ?>>Weight</option>
                    <option value="temperature" <?= $conversionType === 'temperature' ? 'selected' : '' ?>>Temperature</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="value">Value:</label>
                <input type="number" name="value" id="value" min="1" value="<?= htmlspecialchars($value) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="from_unit">From:</label>
                <select name="from_unit" id="from_unit">
                    <?php foreach ($conversionTypes[$conversionType] as $unit): ?>
                        <option value="<?= $unit ?>" <?= $fromUnit === $unit ? 'selected' : '' ?>>
                            <?= ucfirst($unit) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="to_unit">To:</label>
                <select name="to_unit" id="to_unit">
                    <?php foreach ($conversionTypes[$conversionType] as $unit): ?>
                        <option value="<?= $unit ?>" <?= $toUnit === $unit ? 'selected' : '' ?>>
                            <?= ucfirst($unit) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <button type="submit" name="convert">Convert</button>
        </form>
        
        <?php if ($result): ?>
            <div class="result">
                <h3>Result:</h3>
                <p><?= $result ?></p>
            </div>
        <?php endif; ?>
    </div>
    
    <script>
        // Auto-submit form when conversion type changes
        document.getElementById('conversion_type').addEventListener('change', function() {
            this.form.submit();
        });
    </script>
</body>
</html>