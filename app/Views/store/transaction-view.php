<div class="flex flex-row w-full justify-center items-center min-h-screen">
    <div class="flex p-3 bg-slate-100 flex-col m-3 h-3/6 rounded-lg shadow-lg">
    <div class="flex flex-col items-start border-b border-zinc-700">
    <h1 class="text-xl m-3 text-zinc-800 text-bold"> Address: </h1>
    <p class="text-lg ml-3 mb-3 text-zinc-800"> <?= $data['address'] ?> </p>
    </div>
    <div class="flex justify-center w-full">

<form method="post" action="<?=base_url('/update_status')?>">
  
    <div class="flex flex-col gap-5 m-5 h-full text-zinc-800">
        <input type="hidden" value="<?= $data['id']; ?>" name="id">
        <input readonly disabled type="text" name="item_name" class="text-3xl bg-transparent" value="<?php echo $data['item_name'] ?>"/>
        <div class="flex flex-row items-center">
        <h3>Rp.</h3>
        <input readonly disabled  type="number" name="price" class="text-lg bg-transparent text-zinc" value="<?php echo $data['price'] ?>">
        </div>
        <p class="text-lg"> Size: <?= $data['size']; ?> </p>
    <h3 class="text-lg text-zinc-800"> Quantity: <?= $data['quantity']; ?>  </h3>
    <h3 class="text-lg text-zinc-800"> Payment Method: <?= $data['payment_method']; ?> ( Rp.<?= $paymentArr['admin_fee'] ?> )  </h3>
    <h3 class="text-lg text-zinc-800"> Delivery Courier: <?= $data['delivery_courier']; ?> ( Rp.<?= $courierArr['price'] ?> )  </h3>
<h1 class="text-lg text-zinc-800 border-t border-zinc-700"> Total Price: Rp.<?php echo $data["total_price"] ?> </h1>
<button type="submit" class="btn bg-zinc-800"> Place Order </button>
</div>
</form>
</div>

  </div>
</div>