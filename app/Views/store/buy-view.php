<div class="flex justify-center w-full">
<div class="flex lg:flex-row w-3/4 flex-col gap-3 min-h-screen items-center lg:items-start lg:justify-between m-5">
<div class="carousel sm:w-full sm:h-5/6 h-full w-5/6 rounded">
  <div id="slide1" class="carousel-item relative w-full">
    <img src="<?php echo base_url() ?>assets/content/display/<?php echo $data['id'] ; ?>-1.png" class="w-full" />
    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
      <a disabled class="btn btn-circle">❮</a> 
      <a href="#slide2" class="btn btn-circle">❯</a>
    </div>
  </div> 
  <div id="slide2" class="carousel-item relative w-full">
    <img src="<?php echo base_url() ?>assets/content/display/<?php echo $data['id'] ; ?>-2.png" class="w-full" />
    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
      <a href="#slide1" class="btn btn-circle">❮</a> 
      <a disabled class="btn btn-circle">></a> 
    </div>
  </div> 
    </div>

    <form method="post" action="<?php if(session('isAdmin')){ echo base_url('/update_stock'); } else if(!session('isAdmin')){ echo base_url('/add_transactions'); }?>">
    <div class="flex flex-col gap-5 m-5 h-full text-zinc-800">
      <input type="hidden" value="<?= $data['id'] ?>" name="id" id="id">
        <input <?php if(!session('isAdmin')){echo "readonly";} ?> type="text" name="item_name" id="item_name" class="text-3xl bg-transparent" value="<?php echo $data['name'] ?>"/>
        <div class="flex flex-row items-center">
        <h3>Rp.</h3>
        <input <?php if(!session('isAdmin')){echo "readonly";} ?>  type="number" name="price" id="price" class="text-lg bg-transparent text-zinc" value="<?php echo $data['price'] ?>">
        </div>
        <input <?php if(!session('isAdmin')){echo "readonly";} ?>  type="text" name="desc" id="price" class="text-lg bg-transparent text-zinc" value="<?php echo $data['desc'] ?>">
        <h3 class="text-base text-zinc-800"> Stock: <?= $data['stock'] ?> </h3>
        <label class="input-group w-full <?php if(!session('isAdmin')){echo "hidden";} ?>">
    <span class="bg-zinc-700 text-slate-200"> + </span>
    <input type="number" name="stock"  class=" input w-full input-bordere bg-slate-50" <?php if(session('isAdmin')) echo 'required'; ?> />
  </label>
        <p class="text-lg"> Size: </p>
        <div class="flex gap-2 flex-row">
        <div class="form-control">

  <label class="label cursor-pointer">
    <span class="label-text text-zinc-700 mr-3">S</span> 
    <input type="radio" name="size" class="radio checked:bg-zinc-700 border-zinc-700" value="S" <?php if(!session('isAdmin')) echo "required"; ?> />
  </label>
</div>
<div class="form-control">
  <label class="label cursor-pointer">
    <span class="label-text text-zinc-700 mr-3">M</span> 
    <input type="radio" name="size" class="radio checked:bg-zinc-700 border-zinc-700" value="M" <?php if(!session('isAdmin')) echo "required"; ?> />
  </label>
</div>
<div class="form-control">
  <label class="label cursor-pointer">
    <span class="label-text text-zinc-700 mr-3">L</span> 
    <input type="radio" name="size" class="radio checked:bg-zinc-700 border-zinc-700" value="L" <?php if(!session('isAdmin')) echo "required"; ?> />
  </label>
</div>
<div class="form-control">
  <label class="label cursor-pointer">
    <span class="label-text text-zinc-700 mr-3">XL</span> 
    <input type="radio" name="size" class="radio checked:bg-zinc-700 border-zinc-700" value="XL" <?php if(!session('isAdmin')) echo "required"; ?> />
  </label>
</div>
        </div>
        <select name="payment_method" id="payment_method" class="bg-slate-50 text-zinc-800 rounded-lg h-12" <?php if(!session('isAdmin')) echo "required"; ?>>
                        <option value="">Payment Method</option>
                        <?php foreach ($payment as $key => $value) : ?>
                        <option value="<?=$value['payment_method']?>" ><?=$value['payment_method']?> - (admin fee: <?=$value['admin_fee']?>) </option>
                        <?php endforeach; ?>
                    </select>
                    <select name="courier" id="courier" class="bg-slate-50 text-zinc-800 rounded-lg h-12" <?php if(!session('isAdmin')) echo "required"; ?>d>
                        <option value="">Courier</option>
                        <?php foreach ($courier as $key => $value) : ?>
                        <option value="<?=$value['courier_name']?>" ><?=$value['courier_name']?> - (price: <?=$value['price']?>)</option>
                        <?php endforeach; ?>
                    </select>
        <div class="form-control">
  <label class="input-group w-full">
    <span class="bg-zinc-700 text-slate-200">Qty</span>
    <input type="number" name="quantity"  class="input w-full input-bordere bg-slate-50" <?php if(!session('isAdmin')) echo "required"; ?> />
  </label>
</div>    <?php if(!session('isAdmin')) { ?>
          <button type="submit" class="p-3 rounded-lg text-slate-200  bg-zinc-700 active:bg-zinc-900 hover:bg-zinc-800"> Order Now </button>
          </form>
          <?php } else{ ?>
          <button type="submit" class="p-3 rounded-lg text-slate-200  bg-zinc-700 active:bg-zinc-900 hover:bg-zinc-800"> Edit Data </button>
          </form>
          <?php } ?>

    </div>

    <div class="flex flex-row lg:flex-col">
  <div class="p-3 mt-5 bg-slate-50 h-40 w-44 shadow-md"></div>
  <div class="p-3 mt-5 bg-slate-50 h-40 w-44 shadow-md"></div>
  </div>  
  </div>
</div>

