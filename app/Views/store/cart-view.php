<div class="flex flex-col gap-5 m-5 justify-start min-h-screen">
    <h1 class="text-3xl font-thin text-zinc-800"> Pending Orders </h1>
    <?php foreach ($pending as $pending): ?>
    <div class="h-fit w-full flex flex-row p-3 rounded-lg font-thin shadow-md bg-slate-50">
        <p class="text-xl text-zinc-800"> <?= $pending->item_name ?> </p>
    </div>
    <?php endforeach ?>
    <h1 class="text-3xl font-thin text-zinc-800"> Completed Orders </h1>
    <?php foreach ($complete as $complete): ?>
    <div class="h-fit w-full  flex flex-row p-3 rounded-lg font-thin shadow-md bg-slate-50">
        <p class="text-xl text-zinc-800"> <?= $complete->item_name ?> </p>
    </div>
    <?php endforeach ?>
</div>