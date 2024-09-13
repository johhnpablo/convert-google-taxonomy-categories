# convert-google-taxonomy-categories
 
Este script PHP foi criado com o objetivo de ajudar outros programadores que estejam enfrentando dificuldades em converter um arquivo de categorias de taxonomia do Google para um formato de array em PHP.

### Descrição
O script lê um arquivo de texto (data_google_taxonomy.txt) que contém categorias no formato:

```yaml
772 - Adultos
780 - Adultos > Armas
2214 - Adultos > Armas > Acessórios e cuidados para armas
```
E gera um novo arquivo PHP (google_taxonomy_categories.php) com um array estruturado da seguinte forma:


```php
<?php
$google_taxonomy_categories = [
    [
        "id" => 772,
        "category_handle" => "Adultos"
    ],
    [
        "id" => 780,
        "category_handle" => "Adultos > Armas"
    ],
    [
        "id" => 2214,
        "category_handle" => "Adultos > Armas > Acessórios e cuidados para armas"
    ],
];
?>
```

### Objetivo
A intenção é facilitar o trabalho de outros desenvolvedores que precisam manipular as categorias da taxonomia do Google em seus projetos PHP, fornecendo um formato de array fácil de usar e integrar.
