

<div class="bg-slate-200 flex flex-col justify-center items-center h-auto w-full">
<?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-warning flex justify-start w-1/2" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <div class="flex flex-col w-full items-center m-3">
        <div class=" p-10  justify-center m-3 rounded-lg w-10/12 lg:w-fit bg-slate-100 shadow-lg lg:h-fit h-fit">
        <form method="post" class="text-zinc-800 w-full flex flex-col items-center gap-5" enctype="multipart/form-data" action="<?= base_url('profile/update_profile'); ?> ">
            <?= csrf_field(); ?>

            <div class="avatar">
  <div class="w-24 lg:w-48 rounded-full bg-zinc-800" aria-placeholder="avatar">
    <img src="<?= $data->imagePath ?>" />
  </div>
</div>
<input type="file" class="file-input file-input-bordered w-full max-w-xs bg-slate-50" accept="image/*" id="image_avatar" name="image_avatar" />

            <div class="input-control w-full">
                <input type="hidden" name="id" value="<?= $data->id ?>">
            <input type="text" value="<?= $data->name ?>" name="name" id="name" placeholder="Name" class="border w-full border-zinc-700 border-opacity-50 form-control bg-slate-50 input max-w-none rounded-lg mb-5" required autofocus>
            <label class="text-zinc-700" for="birth_date">Birth Date</label>
            <input type="date" value="<?= $data->birth_date ?>" name="birth_date" id="birth_date" class="border border-zinc-700 border-opacity-50 bg-slate-50 max-w-none h-14 w-full rounded-lg mb-5" placeholder="Birth Date" required>
            <h3>Address</h3>
            <textarea name="address" id="address" class="border border-zinc-700 border-opacity-50 resize-none form-control bg-slate-50 input max-w-none w-full rounded-lg mb-5 h-24" placeholder="Address"><?= $data->address ?></textarea>
            <button type="submit" class="btn btn-wide max-w-none lg:w-96 w-full mb-3 bg-zinc-700 text-slate-200">Update Profile</button>
        </div>
        </form>
        </div>
            </div>
</div>