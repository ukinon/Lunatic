

<div class="bg-slate-200 flex flex-col justify-center items-center h-screen w-full">
<?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-warning w-10/12 mb-3" role="alert">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <div class="flex p-5 w-10/12 h-3/4 lg:h-5/6 bg-slate-100 rounded-lg justify-center items-center">
            <div class="hidden lg:flex text-3xl">
            <img src="<?php echo base_url();?>assets/lunaticLogo.png">
            </div>
        <div class="flex p-10 items-center justify-center lg:ml-48 rounded-md shadow-lg w-10/12 lg:w-fit bg-slate-300 lg:h-5/6 h-3/4">
        <form method="post" action="<?= base_url(); ?>login/process">
            <?= csrf_field(); ?>
            <h1 class="h3 mb-3 fw-normal text-xl text-black">Login</h1>
            <div class="input-control">
            <input type="text" name="username" id="username" placeholder="Username" class="border border-zinc-700 border-opacity-50 form-control bg-slate-50 input max-w-none w-full rounded-lg mb-5" required autofocus>
            <input type="password" name="password" id="password" placeholder="Password" class="border border-zinc-700 border-opacity-50 form-control input bg-slate-50 max-w-none w-full rounded-lg mb-5" required>
            <button type="submit" class="btn btn-wide max-w-none lg:w-96 w-full mb-3 bg-zinc-600">Login</button>

            <div class="flex flex-col gap-5px">
            <p class="text-sm text-zinc-700"> Don't have an accout?<p> <a class="pe-auto text-sm text-blue-500" href="<?= base_url('register') ?>"> Sign Up <a>
        </div>
        </div>
        </form>
        </div>
        </div>
</div>