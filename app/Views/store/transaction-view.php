
<div class="flex justify-center m-10">
    <div class="border border-zinc-800 border-opacity-50 rounded-lg  lg:w-8/12">
    <form method="post" action="<?=base_url('/update_status')?>">
    <input type="hidden" value="<?= $data['id']; ?>" name="id">
        <input type="hidden" value="<?= $data['quantity']; ?>" name="quantity">
        <div class="m-3 flex flex-col gap-5 lg:gap-3 p-3 min-w-max ">
        <h1 class="text-3xl font-thin text-zinc-800 m-3"> Confirm Order </h1>

  
 
                    <input readonly type="text" name="item_name" id="item_name" value="<?php echo $data['item_name'] ?>" placeholder="Item Name" class="input w-full input-bordered bg-slate-50 text-black" <?php if(!session('isAdmin')) echo "required"; ?> />

                    <input readonly type="text" value="Payment Method: <?= $data['payment_method']; ?> ( Rp.<?= $paymentArr['admin_fee'] ?> )" placeholder="Item Name" class="input w-full input-bordered bg-slate-50 text-black" <?php if(!session('isAdmin')) echo "required"; ?> />

                    <input readonly type="text" value="Delivery Courier: <?= $data['delivery_courier']; ?> ( Rp.<?= $courierArr['price'] ?> )" placeholder="Item Name" class="input w-full input-bordered bg-slate-50 text-black" <?php if(!session('isAdmin')) echo "required"; ?> />

    
       <label class="input-group w-full">
                      <span> Qty </span>
                    <input readonly type="number" name="quantity" id="quantity" min=0 value="<?= $data['quantity']; ?>"  class="input w-full input-bordered bg-slate-50 text-black" <?php if(!session('isAdmin')) echo "required"; ?> />
                        
                  </label>


                    <h3 class="text-zinc-800 text-lg">Total: Rp.<?= number_format($data['total_price'], 2,',','.') ?></h3>
                        

            
                  <button type="submit" class="btn bg-zinc-800"> Place Order </button>
     
                        </div>
                        </form>
    </div>
        </div>