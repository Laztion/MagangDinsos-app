<?php
$resourcesDir = __DIR__ . '/app/Filament/Resources';
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($resourcesDir));
$regex = new RegexIterator($iterator, '/^.+Resource\.php$/i', RecursiveRegexIterator::GET_MATCH);

foreach ($regex as $file) {
    $filePath = $file[0];
    $content = file_get_contents($filePath);
    
    // Check if canAccess exists
    if (preg_match('/public\s+static\s+function\s+canAccess\s*\(\)\s*:\s*bool\s*\{.*?\}/s', $content)) {
        $content = preg_replace('/public\s+static\s+function\s+canAccess\s*\(\)\s*:\s*bool\s*\{.*?\}/s', "public static function canAccess(): bool\n    {\n        return auth()->user()->can('access ' . class_basename(static::class));\n    }", $content);
    } else {
        // Insert before public static function form
        $content = str_replace('public static function form', "public static function canAccess(): bool\n    {\n        return auth()->user()->can('access ' . class_basename(static::class));\n    }\n\n    public static function form", $content);
    }
    
    file_put_contents($filePath, $content);
    echo "Updated " . basename($filePath) . "\n";
}

// Delete all policies in app/Policies
$policiesDir = __DIR__ . '/app/Policies';
if (is_dir($policiesDir)) {
    $files = glob($policiesDir . '/*Policy.php');
    foreach ($files as $file) {
        unlink($file);
        echo "Deleted " . basename($file) . "\n";
    }
}
