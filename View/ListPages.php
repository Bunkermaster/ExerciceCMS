<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List pages</title>
</head>
<body>
<ul>
    <?php foreach( $entityCollection as $entity ):?>
    <?php /** @var \Entity\ContentEntity $entity */?>
    <li>
        <strong><?php echo $entity->getHeaderTitle();?></strong><br />
        <?php echo $entity->getBody();?><br />
        <a href="index.php?p=viewPage&id=<?php echo $entity->getId();?>">View page</a>


    </li>
    <?php endforeach;?>
</ul>
</body>
</html>
