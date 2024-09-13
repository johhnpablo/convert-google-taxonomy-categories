<?php

header('Content-Type: text/html; charset=utf-8');

$file_path = './storage/data_google_taxonomy.txt';
$new_file_path = './src/google_taxonomy_categories.php'; // Name of the new PHP file to be created

$category_google_taxonomy = [];

if(file_exists($file_path)){
    $file = fopen($file_path, 'r');

    if ($file) {
        while (($line = fgets($file)) !== false) {
            $line = trim($line);

            // Try to fix the encoding
            $line = utf8_decode($line);

            if (!empty($line) && strpos($line, ' - ') !== false) {
                list($category_id, $category_name) = explode(' - ', $line, 2);
                $category_google_taxonomy[] = [
                    'id' => (int)$category_id,
                    'category_handle' => $category_name
                ];
            }
        }

        fclose($file);

        // Creating a new PHP file and writing the data in the desired array format
        $new_file = fopen($new_file_path, 'w');

        if ($new_file) {
            fwrite($new_file, "<?php\n");
            fwrite($new_file, "\$google_taxonomy_categories = [\n");

            foreach ($category_google_taxonomy as $item) {
                fwrite($new_file, "    [\n");
                fwrite($new_file, "        \"id\" => " . $item['id'] . ",\n");
                fwrite($new_file, "        \"category_handle\" => \"" . addslashes($item['category_handle']) . "\"\n");
                fwrite($new_file, "    ],\n");
            }

            fwrite($new_file, "];\n");
            fwrite($new_file, "?>");
            fclose($new_file);
            echo 'Novo arquivo criado com sucesso: ' . $new_file_path;
        } else {
            echo 'Erro ao criar o novo arquivo.';
        }

    } else {
        echo 'Erro ao abrir o arquivo original.';
    }
} else {
    echo 'Arquivo original não encontrado.';
}

// Displaying the array for verification
echo "<pre>";
print_r($category_google_taxonomy);
echo "</pre>";

?>
