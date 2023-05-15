<div class="flex justify-center w-full">
<div class="flex lg:flex-row w-3/4 flex-col gap-3 h-screen justify-center lg:justify-between m-5">
<div class="carousel w-2/5 h-3/4 rounded">
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

    
    <div class="flex flex-col gap-5 m-5 h-full text-zinc-800">
        <h1 class="text-3xl"> <?php echo $data['name'] ?> </h1>
        <p class="text-lg"> Rp.<?php echo $data['price'] ?> </p>
        <p class="text-lg"> <?php echo $data['desc'] ?></p>
        <p class="text-lg"> Size: </p>
        <div class="flex gap-2 flex-row">
        <div class="form-control">
  <label class="label cursor-pointer">
    <span class="label-text text-zinc-700 mr-3">S</span> 
    <input type="radio" name="radio-10" class="radio checked:bg-zinc-700 border-zinc-700" />
  </label>
</div>
<div class="form-control">
  <label class="label cursor-pointer">
    <span class="label-text text-zinc-700 mr-3">M</span> 
    <input type="radio" name="radio-10" class="radio checked:bg-zinc-700 border-zinc-700" />
  </label>
</div>
<div class="form-control">
  <label class="label cursor-pointer">
    <span class="label-text text-zinc-700 mr-3">L</span> 
    <input type="radio" name="radio-10" class="radio checked:bg-zinc-700 border-zinc-700" />
  </label>
</div>
<div class="form-control">
  <label class="label cursor-pointer">
    <span class="label-text text-zinc-700 mr-3">XL</span> 
    <input type="radio" name="radio-10" class="radio checked:bg-zinc-700 border-zinc-700" />
  </label>
</div>
        </div>
        <div class="form-control">
  <label class="input-group bg-slate-100">
    <span class="bg-slate-100">Qty</span>
    <input type="number" placeholder="10" class="input input-bordere bg-slate-50" />
  </label>
</div>
          <a class="btn"> Order Now </a>
    </div>

    <div class="flex flex-row lg:flex-col">
  <div class="p-3 mt-5 bg-slate-50 h-40 w-44 shadow-md"></div>
  <div class="p-3 mt-5 bg-slate-50 h-40 w-44 shadow-md"></div>
  </div>  
  </div>
</div>

