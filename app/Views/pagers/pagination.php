<?php $pager->setSurroundCount(2) ?>

<div class="btn-group m-3 flex justify-center w-full">
<?php if ($pager->hasPrevious()) { ?>
                <a class="btn" href="<?= $pager->getPrevious() ?>">
                    «
                </a>
             <?php } ?>
             
             <?php foreach ($pager->links() as $link) : ?>
<a class="btn"  href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?> </a>
        <?php endforeach ?>

  
  <?php if ($pager->hasNext()){ ?>
                <a class="btn" href="<?= $pager->getNext() ?>>
                    »
                </a>
        <?php } ?>
</div>