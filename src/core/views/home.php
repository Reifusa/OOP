<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<form action="/addProdu" method="post">
        <input type="text" name="name" placeholder="Введите название">
        <input type="text" name="desc" placeholder="Введите описание">
        <input type="text" name="price" placeholder="Введите цену">
        <button type="submit">Добавить</button>
</form>

    <a href="/getProd">Весь товар</a>
</body>
</html>