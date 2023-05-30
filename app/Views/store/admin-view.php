<h1 class="text-3xl font-thin text-zinc-800 m-5"> Transaction Report </h1>
<div class="m-5 overflow-hidden h-auto">
    <table class="w-full text-black shadow-md h-full border-white table-compact text-center">
    <thead class="bg-zinc-800 text-slate-200  sticky top-0">
      <tr>
        <td class="w-10"> No. </td>
        <td> Buyer </td>
        <td> Address </td>
        <td> Transaction Time </td>
        <td> Invoice ID </td>
        <?php if (session('logged_in')) { ?>
          <td> Invoice </td>
        <?php } ?>
      </tr>
    </thead>
    <tbody class="bg-slate-50 text-black">
<?php if(count($data) > 0){ ?>
    <?php foreach ($data as $data): ?>
        <tr> 
                        <td> <?= $number++ ?>  </td>
                        <td> <?= $data['user'] ?> </td> 
                        <td> <?= $data['address'] ?> </td> 
                        <td> <?= $data['created_at'] ?> </td>
                        <td> <?= $data['invoice_id'] ?> </td>
                        <td class="flex justify-center items-center"> <a href="<?= base_url('invoice/cartInv/'.$data['invoice_id']) ?>" class="w-5 h-5"><i data-feather="download" class="bg-transparent download-icon"></i></a> </td>
                        </tr>
    <?php endforeach ?>
    </tbody>
  </table>
  <?= $pager->links('data', 'pagination') ?>
  
    <?php } else{ ?>
            <div class="w-full h-10/12 flex justify-center h-screen items-center">
                <h1 class="text-3xl font-thin text-zinc-800"> No History </h1>
            </div>
    </table>
        <?php } ?>
    </div>

    <div class="flex justify-center m-10">
    <div class="border border-zinc-800 border-opacity-50 rounded-lg  lg:w-8/12">
      <form method="post" action="<?= base_url('admin/addItem') ?>" enctype="multipart/form-data">
        <div class="m-3 flex flex-col gap-5 lg:gap-3 p-3 min-w-max ">
        <h1 class="text-3xl font-thin text-zinc-800 m-3"> Add Items </h1>

         <?php if (!empty(session()->getFlashdata('error'))) : ?>
          <div class="alert alert-warning w-10/12 mb-3" role="alert">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <?php if (!empty(session()->getFlashdata('success'))) : ?>
          <div class="alert alert-success w-10/12 mb-3" role="alert">
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>


                    <input type="text" name="ItemName" id="ItemName" placeholder="Item Name" class="input w-full input-bordered bg-slate-50 text-black" <?php if(!session('isAdmin')) echo "required"; ?> />
                    <input type="text" name="ItemDesc" id="ItemDesc" placeholder="Item Description" class="input w-full h-20 input-bordered bg-slate-50 text-black" <?php if(!session('isAdmin')) echo "required"; ?> />
                    <label class="input-group w-full">
                      <span> Rp. </span>
                    <input type="number" name="ItemPrice" id="ItemPrice" min=0  class="input w-full input-bordered bg-slate-50 text-black" <?php if(!session('isAdmin')) echo "required"; ?> />
                        
                  </label>

                  <label class="input-group w-full">
                      <span> Stock </span>
                    <input type="number" name="ItemStock" id="ItemStock" min=0  class="input w-full input-bordered bg-slate-50 text-black" <?php if(!session('isAdmin')) echo "required"; ?> />
                        
                  </label>

                        <div class="form-control w-full max-w-xs">
  <label class="label">
    <span class="label-text text-black">Upload Image</span>
  </label>
  <input type="file" accept="image/*" class="file-input file-input-bordered w-full max-w-xs bg-slate-50" id="image1" name="image1" required />
  <input type="file" accept="image/*" class="file-input file-input-bordered w-full max-w-xs bg-slate-50" id="image2" name="image2" required />

</div>

                    <input type="submit" class="btn bg-slate-100 text-black" value="add data">
     
                        </div>
                        </form>
    </div>
        </div>