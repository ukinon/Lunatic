<div class=" my-5 flex flex-col items-center gap-5">
<h1 class="text-3xl text-zinc-700 font-thin"> Check Out Our Collection </h1>
<div class="flex justify-center">
  <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
<?php if(count($list) > 0){ ?>
<?php foreach($list as $row): ?>
    <a href="<?= base_url('buy/display/'.$row->id)?>">
    <div class="card cursor-pointer w-40 lg:w-64 h-80 lg:h-96 min-h-none bg-slate-50 shadow-xl transition ease-in-out delay-100 hover:scale-105 text-zinc-800">
  <figure><img src="<?php echo base_url(); echo $row->image1 ?>" alt="Shoes" class="w-" /></figure>
  <div class="card-body">
    <h2 class="card-title text-sm">
      <?= $row -> name ?>
    </h2>
    <p class="text-xs">Rp.<?= $row -> price ?> </p>
    <div class="card-actions justify-end">
      <div class="badge badge-outline">Stock: <?= $row -> stock ?></div>
    </div>
  </div>
</div>
</a>
    <?php endforeach; ?>
    <?php }  ?>
</div>
</div>
</div>