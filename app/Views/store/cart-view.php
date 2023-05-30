
<div class="flex flex-col gap-5 m-5 min-h-screen">
    <h1 class="text-3xl font-thin text-zinc-800"> Pending Orders </h1>
    <?php if(count($pending) > 0){ ?>
      <form method="post" class="flex flex-col gap-4 h-full" action="<?= base_url('update_cart_status') ?>">
    <?php foreach ($pending as $pending): ?>
    <div class="h-fit w-full p-3 rounded-lg font-thin shadow-md bg-slate-50">
    <input type="hidden" name="cart_name[]" value="<?= $pending->item_name ?>">
    <input type="checkbox" name="cart_id[]" value="<?= $pending->id ?>" class="checkbox border-zinc-800 border-opacity-50">
        <div class="m-3 flex flex-row justify-between">
        <div class="flex flex-col gap-2">
        <p class="text-lg text-zinc-800"> <?= $pending->item_name ?>  </p>
        <input type="number" class="input bg-transparent input-bordered border-zinc-800 text-zinc-800" name="cart_quantity[]" value="<?= $pending->quantity ?>">
        <p class="text-sm text-zinc-800"> <?= $pending->size ?> </p>
        <p class="text-lg text-zinc-800">Rp. <?= $pending->price * $pending->quantity ?> </p>
        </div>
        <label class="trash-icon" data-id="<?= $pending->id ?>" for="my-modal-6"><i data-feather="trash" class="bg-transparent trash-icon"></i></label>
        </div>
    </div>
    <?php endforeach ?>
    <div class="w-full flex justify-end bottom-0 items-center rounded-lg p-5 bg-zinc-800 shadow-lg sticky">
      <button id="buy" class="btn bg-zinc-500 text-slate-200" type="submit">Buy Selected</button>
    </div>
    </form>
    <?php } else{ ?>
            <div class="w-full h-10/12 flex justify-center h-screen items-center">
                <h1 class="text-3xl font-thin text-zinc-800"> Your Cart is Empty </h1>
            </div>
        <?php } ?>
</div>

<!-- The button to open modal -->


<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-6" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle text-zinc-800">
  <div class="modal-box bg-slate-50">
    <div class="flex flex-row gap-3 items-center">
    <i data-feather="x-circle" class="w-14 h-14 text-red-500"></i>
    <h3 class="font-light text-lg text-zinc-800">Are you sure you want to cancel your order?</h3>
    </div>
    <div class="modal-action">
    <label for="my-modal-6" class="btn bg-transparent border-zinc-700 w-24 text-zinc-800">No</label>
    <a id="deleteBtn" class="btn bg-red-500 border-none w-24 text-zinc-700 px-8"> Yes </a>
    </div>
  </div>
</div>


<script>


 
  $(document).ready(function() { 

    $('.trash-icon').click(function(){
    //get cover id
    var id=$(this).data('id');
    //set href for cancel button
    $('#deleteBtn').attr('href','<?= base_url('cart/cancel/')?>'+id);
})
 
     $('#buy').attr("disabled", true);
 
     $('.checkbox').change(function() {
        $('#buy').attr('disabled', $('.checkbox:checked').length == 0);
     });
 
  });
 
  </script>
