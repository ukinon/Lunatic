<div class="flex justify-center m-3">
<div class="w-5/6 flex justify-start">

</div>
</div>

<div class="flex flex-col items-center w-full mb-3">
<form class="w-full bg-slate-200 flex-col flex items-center" method="post" action="<?= base_url('buy/AddComments') ?>">
<input type="hidden" name="clothes_id" id="clothes_id" value="<?= $data['id'] ?>">
<div class="p-5 w-full lg:w-10/12 bg-slate-50 rounded-xl shadow-md z-30">
<h1 class="text-xl lg:text-2xl font-thin text-zinc-700"> Comments: </h1>
<div class="flex flex justify-center w-full">
<textarea class="h-24 lg:h-44 m-3 w-full bg-slate-100 rounded-lg text-zinc-700 border-zinc-700 border-2 border-opacity-50 border-solid resize-none" placeholder=" Add Your Comment" name="comment" id="comment"></textarea>
</div>
<div class="flex w-full justify-end">
<button type="submit" class="btn btn-sm lg:w-1/12 w-3/12 bg-zinc-700">Send</button>
</div>
</div>
</form>
<div class="flex flex-col w-full items-center bg-slate-200">
<?php foreach ($comments as $key => $value) : ?>
    <div class="w-full lg:w-10/12 rounded-b-2xl p-3 bg-slate-50 -mt-4 mb-0 h-auto text-zinc-700">
    <p class="text-sm m-2 lg:text-lg font-bold"> <?= $value["user"] ?></p>
    <p class="text-xs m-2 lg:text-base mt-3 text-zinc-700"> <?= $value['comment'] ?></p>
    <p class="text-xs m-2 lg:text-sm mt-3 text-zinc-600"> <?= substr($value['created_at'], 0, 10)  ?></p>
    </div>
    <?php endforeach; ?>
</div>
</div>