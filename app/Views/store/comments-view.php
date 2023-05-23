<div class="flex justify-center m-3">
<div class="w-5/6 flex justify-start">
<h1 class="text-3xl font-thin text-zinc-700"> Comments: </h1>
</div>
</div>

<div class="flex flex-col items-center w-full mb-3">
<form class="w-full flex-col flex items-center" method="post" action="<?= base_url('buy/AddComments') ?>">
<input type="hidden" name="clothes_id" id="clothes_id" value="<?= $data['id'] ?>">
<div class="flex justify-center w-full">
<textarea class="h-24 lg:h-44 m-3 w-10/12 bg-slate-100 rounded-lg text-zinc-700 border-zinc-700 border-2 border-opacity-50 border-solid resize-none" placeholder="Add Your Comment" name="comment" id="comment"></textarea>
</div>
<div class="flex w-10/12 justify-end">
<button type="submit" class="btn btn-sm lg:w-1/12 w-3/12 bg-zinc-700">Send</button>
</div>
</form>

<?php foreach ($comments as $key => $value) : ?>
    <div class="w-10/12 m-0 bg-slate-200 border-b border-zinc-700 mt-3 mb-0 h-auto text-zinc-700">
    <p class="text-sm m-2 lg:text-lg font-bold"> <?= $value["user"] ?></p>
    <p class="text-xs m-2 lg:text-base mt-3 text-zinc-700"> <?= $value['comment'] ?></p>
    <p class="text-xs m-2 lg:text-sm mt-3 text-zinc-600"> <?= substr($value['created_at'], 0, 10)  ?></p>
    </div>
    <?php endforeach; ?>
</div>