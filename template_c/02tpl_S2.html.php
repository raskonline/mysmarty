<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>模板</title>
</head>
<body>
<div>
    <h1 style='color: #803138;'>
        <?php echo $this->tpl_var['title'];?>
    </h1>

    <p style='color: #18158b;'>
        <?php echo $this->tpl_var['content'];?>
    </p>
</div>
</body>
</html>