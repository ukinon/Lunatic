<div class="flex flex-col gap-5 m-5 justify-start min-h-screen">
<h1 class="text-3xl font-thin text-zinc-800"> Transaction History </h1>
<?php if(count($complete) > 0){ ?>
    <?php foreach ($complete as $complete): ?>
    <div class="h-fit w-full p-3 rounded-lg font-thin shadow-md bg-slate-50">
        <div class="m-3 flex flex-row justify-between">
        <div class="flex flex-col gap-2">
        <p class="text-lg text-zinc-800"> <?= $complete->item_name ?> (<?= $complete->quantity ?>)  </p>
        <p class="text-sm text-zinc-800"> <?= $complete->size ?> </p>
        <p class="text-lg text-zinc-800">Rp. <?= $complete->price * $complete->quantity ?> </p>
        <p class="text-xs text-zinc-800"><?= $complete->created_at?> </p>
        </div>
        <a href="<?= base_url('invoice/cartInv/'.$complete->invoice_id) ?>"><i data-feather="download" class="bg-transparent download-icon"></i></a>
        </div>
    </div>
    <?php endforeach ?>
    <?php } else{ ?>
            <div class="w-full h-10/12 flex justify-center h-screen items-center">
                <h1 class="text-3xl font-thin text-zinc-800"> No History </h1>
            </div>
        <?php } ?>
    </div>