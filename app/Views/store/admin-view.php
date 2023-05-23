<h1 class="text-3xl font-thin text-zinc-800 m-5"> Transaction Report </h1>
<div class=" m-5 overflow-auto h-screen">
<table class="w-full text-black shadow-md h-5/6 border-white table-compact text-center">
    <thead class="bg-zinc-800 text-slate-200  sticky top-0">
      <tr>
        <td class="w-10"> No. </td>
        <td> Item Name</td>
        <td> Size </td>
        <td> Price </td>
        <td> Quantity </td>
        <td> Buyer </td>
        <td> Address </td>
        <td> Payment Method </td>
        <td> Delivery Courier </td>
        <td> Total Price </td>
        <td> Transaction Time </td>
        <?php if (session('logged_in')) { ?>
          <td> Invoice </td>
        <?php } ?>
      </tr>
    </thead>
    <tbody class="bg-slate-50 text-black">
<?php if(count($data) > 0){ ?>
    <?php $no=1; foreach ($data as $data): ?>
        <tr> 
                        <td> <?= $no++ ?>  </td>
                        <td> <?= $data->item_name ?>  </td> 
                        <td> <?= $data->size ?>  </td> 
                        <td> <?= $data->price ?> </td> 
                        <td> <?= $data->quantity ?> </td> 
                        <td> <?= $data->user ?> </td> 
                        <td> <?= $data->address ?> </td> 
                        <td> <?= $data->payment_method ?> </td> 
                        <td> <?= $data->delivery_courier ?> </td> 
                        <td> <?= $data->total_price ?> </td>
                        <td> <?= $data->created_at ?> </td>
                        <td class="flex justify-center"> <a href="<?= base_url('invoice/cartInv/'.$data->id) ?>" class="w-5 h-5"><i data-feather="download" class="bg-transparent download-icon"></i></a> </td>
                        </tr>
    <?php endforeach ?>
    </tbody>
  </table>
    <?php } else{ ?>
            <div class="w-full h-10/12 flex justify-center h-screen items-center">
                <h1 class="text-3xl font-thin text-zinc-800"> No History </h1>
            </div>
        <?php } ?>
    </div>