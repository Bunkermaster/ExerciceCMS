<?php /** @var \Entity\ContentEntity $entity */?>
<h1><?php echo $entity->getHeaderTitle()?></h1>
<?php echo $entity->getBody()?>
<?php echo $entity->getCreatedAt()?>
