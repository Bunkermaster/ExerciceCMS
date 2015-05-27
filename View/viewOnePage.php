<?php /** @var \Entity\ContentEntity $entity */?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $entity->getTitle()?></title>
</head>
<body>
<h1><?php echo $entity->getHeaderTitle()?></h1>
<?php echo $entity->getBody()?>
<?php echo $entity->getCreatedAt()?>
</body>
</html>
